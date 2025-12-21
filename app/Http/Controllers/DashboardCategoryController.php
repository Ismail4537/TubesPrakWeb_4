<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.categories', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(string $id)
{
    $category = Category::findOrFail($id);
    return view('dashboard.categories.edit', compact('category'));
}

public function update(Request $request, string $id)
{
    $request->validate([
        'name' => 'required|string|max:100'
    ]);

    $category = Category::findOrFail($id);
    $category->update([
        'name' => $request->name
    ]);

    return redirect()
        ->route('categories.index')
        ->with('success', 'Category berhasil diupdate');
}


    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    Category::findOrFail($id)->delete();

    return redirect()
        ->route('categories.index')
        ->with('success', 'Category berhasil dihapus');
}

}
