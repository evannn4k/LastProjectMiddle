<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryCreateRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Models\Category;
use App\Service\Admin\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = Category::all();

        return view('content.admin.category.index', compact('categories'));
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
    public function store(CategoryCreateRequest $request)
    {
        $category = $this->categoryService->createCategory($request->validated());

        if ($category) {
            return redirect()->route('admin.category.index')->with('success', 'Berhasil menambah data kategori');
        } else {
            return redirect()->route('admin.category.index')->with('error', 'Gagal menambah data kategori');
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
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category = $this->categoryService->updateCategory($request->validated(), $category);

        if ($category) {
            return redirect()->route('admin.category.index')->with('success', 'Berhasil mengubah data kategori');
        } else {
            return redirect()->route('admin.category.index')->with('error', 'Gagal mengubah data kategori');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = $this->categoryService->deleteCategory($category);

        if ($category) {
            return redirect()->route('admin.category.index')->with('success', 'Berhasil menghapus data kategori');
        } else {
            return redirect()->route('admin.category.index')->with('error', 'Gagal menghapus data kategori');
        }
    }
}
