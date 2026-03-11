<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductCreateRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Models\Product;
use App\Service\Admin\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        $product = $this->productService->createProduct($request->validated());

        if($product) {
            return redirect()->back()->with('success', 'Berhasil menambah data produk');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah data produk');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product = $this->productService->updateProduct($product, $request->validated());
        
        if($product) {
            return redirect()->back()->with('success', 'Berhasil mengubah data produk');
        } else {
            return redirect()->back()->with('error', 'Gagal mengubah data produk');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product = $this->productService->deleteProduct($product);

        if($product) {
            return redirect()->route("admin.product.index")->with('success', 'Berhasil menghapus data produk');
        } else {
            return redirect()->route("admin.product.index")->with('error', 'Gagal menghapus data produk');
        }
    }
}
