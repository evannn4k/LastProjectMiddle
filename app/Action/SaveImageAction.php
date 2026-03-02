<?php

namespace App\Action;

use Illuminate\Support\Facades\Storage;

class SaveImageAction
{
    /**
     * Create a new class instance.
     */
    public function save($file, $path, $oldImage = null)
    {
        if($oldImage) {
            $filename = time() ."-". $file->getClientOriginalName();
            
            Storage::delete($path . $oldImage);
            $file->storeAs($path, $filename);
        } else {
            $filename = time() ."-". $file->getClientOriginalName();
            $file->storeAs($path, $filename);
        }

        return $filename;
    }
}
