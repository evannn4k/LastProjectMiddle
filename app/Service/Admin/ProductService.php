<?php

namespace App\Service\Admin;

use App\Action\SaveImageAction;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    /**
     * Create a new class instance.
     */
    protected $saveImageAction;
    protected $path = "images/product/";

    public function __construct(SaveImageAction $saveImageAction)
    {
        $this->saveImageAction = $saveImageAction;
    }

    public function createProduct(array $data)
    {
        if (isset($data["image"])) {
            $filename = $this->saveImageAction->save($data["image"], $this->path);
            $data["image"] = $filename;
        }

        $product = Product::create($data);
        return $product;
    }

    public function updateProduct($product, array $data)
    {
        if (isset($data["image"])) {
            $filename = $this->saveImageAction->save($data["image"], $this->path, $product->image);
            $data["image"] = $filename;
        } else {
            unset($data["image"]);
        }

        $product->update($data);
        return $product;
    }

    public function deleteProduct($product)
    {
        if ($product->image) {
            Storage::delete($this->path . $product->image);
        }

        $product->delete();

        return $product;
    }
}
