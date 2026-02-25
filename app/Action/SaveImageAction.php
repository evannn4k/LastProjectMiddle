<?php

namespace App\Action;

use Illuminate\Support\Facades\Storage;

class SaveImageAction
{
    /**
     * Create a new class instance.
     */
    public function save($file, $path, $model = null)
    {
        if($model) {
            $filename = time() ."-". $file->getClientOriginalName();
            
            // dd($path . $model->default_image);
            Storage::delete($path . $model->default_image);
            $file->storeAs($path, $filename);
        } else {
            $filename = time() ."-". $file->getClientOriginalName();
            $file->storeAs($path, $filename);
        }

        return $filename;
    }
}
