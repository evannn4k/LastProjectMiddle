<?php

namespace App\Service\Admin;

use App\Action\SaveImageAction;
use App\Models\Membership;

class MembershipService
{

    public function createMembership($data)
    {
        $membership = Membership::create($data);
        
        return $membership;
    }

    public function updateMembership($data, $membership)
    {
        $membership->update($data);

        return $membership;
    }
    
    public function deleteMembership($membership)
    {
        $membership->delete();

        return $membership;
    }
}
