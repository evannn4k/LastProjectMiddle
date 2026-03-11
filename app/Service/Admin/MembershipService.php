<?php

namespace App\Service\Admin;

use App\Action\SaveImageAction;
use App\Models\Membership;
use Illuminate\Support\Facades\Storage;

class MembershipService
{
    protected $saveImageAction;
    protected $path =  'images/membership/';

    public function __construct(SaveImageAction $saveImageAction)
    {
        $this->saveImageAction = $saveImageAction;
    }

    public function createMembership($data)
    {
        $filename = $this->saveImageAction->save($data['image'], $this->path);

        $data['image'] = $filename;

        $membership = Membership::create($data);
        
        return $membership;
    }

    public function updateMembership($data, $membership)
    {
        if (isset($data['image'])) {
            $filename = $this->saveImageAction->save($data['image'], $this->path, $membership->image);

            $data['image'] = $filename;
        } else {
            unset($data["image"]);
        }

        $membership->update($data);

        return $membership;
    }
    
    public function deleteMembership($membership)
    {
        Storage::delete($this->path . $membership->image);

        $membership->delete();

        return $membership;
    }
}
