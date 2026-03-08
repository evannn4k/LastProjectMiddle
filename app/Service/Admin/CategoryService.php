<?php

namespace App\Service\Admin;

use App\Action\SaveImageAction;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    /**
     * Creae a new class instance.
     */

    protected $saveImageAction;
    protected $path =  'images/category/';

    public function __construct(SaveImageAction $saveImageAction)
    {
        $this->saveImageAction = $saveImageAction;
    }

    public function createCategory($data)
    {
        $filename = $this->saveImageAction->save($data['default_image'], $this->path);

        $data['default_image'] = $filename;

        $category = Category::create($data);
        
        return $category;
    }

    public function updateCategory($data, $category)
    {
        if (isset($data['default_image'])) {
            $filename = $this->saveImageAction->save($data['default_image'], $this->path, $category->default_image);

            $data['default_image'] = $filename;
        } else {
            unset($data["default_image"]);
        }

        if(empty($data["priority"])) {
            $data["priority"] = 0;
        }

        $category->update($data);

        return $category;
    }
    
    public function deleteCategory($category)
    {
        Storage::delete($this->path . $category->default_image);

        $category->delete();

        return $category;
    }
}
