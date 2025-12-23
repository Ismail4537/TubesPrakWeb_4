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
        $categories = Category::paginate(10)->withQueryString();
        return view('dashboard.categories.categories', compact('categories'), ['title' => 'Category Management']);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create', ['title' => 'Create Category']);

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

    /**
     * AJAX live search for categories
     */
    public function search(Request $request)
    {
        $q = $request->query('q', '');

        $categories = Category::when($q, function ($builder) use ($q) {
            $builder->where('name', 'like', "%{$q}%");
        })->limit(50)->get();

        $html = view('dashboard.categories._categories_rows', compact('categories'))->render();

        return response()->json(['html' => $html]);
    }

}
