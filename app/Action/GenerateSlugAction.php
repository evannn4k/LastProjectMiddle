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

        if ($id) {
            $originalSlug = Str::slug($data);
            $slug = $originalSlug;
            $counter = 1;

            while ($model::where("slug", $originalSlug)->where("id", "!=", $id)->exists()) {
                $slug = $originalSlug . "-" . $counter;
                $counter++;
            }
        } else {
            $originalSlug = Str::slug($data);
            $slug = $originalSlug;
            $counter = 1;

            while ($model::where("slug", $originalSlug)->exists()) {
                $slug = $originalSlug . "-" . $counter;
                $counter++;
            }
        }

        return $slug;
    }
}
