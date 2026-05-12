<?php

namespace App\Action;

use Illuminate\Support\Str;

class GenerateSlugAction
{
    /**
     * Create a new class instance.
     */
    public function generate($data, $model, $id = null)
    {
        $slug = null;
        $originalSlug = Str::slug($data);
        $slug = $originalSlug;
        $counter = 1;

        if ($id) {
            while ($model::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug.'-'.$counter;
                $counter++;
            }
        } else {
            while ($model::where('slug', $slug)->exists()) {
                $slug = $originalSlug.'-'.$counter;
                $counter++;
            }
        }

        return $slug;

    }
}
