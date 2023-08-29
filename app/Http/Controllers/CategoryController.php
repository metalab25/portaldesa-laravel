<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Config::find(1);

        return view('dashboard.webmin.categories.index', [
            'user'          => Auth::user(),
            'desa'          => Desa::find(1),
            'config'        => $data,
            'types'         => CategoryType::all(),
            'categories'    => Category::orderBy('name', 'asc')->get()
        ]);
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
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name'              =>  'required',
                'slug'              =>  'required|unique:categories',
                'category_type_id'  =>  'required'
            ],
            [
                'name.required'             => 'Nama Kategori harus isi',
                'slug.required'             => 'Slug Kategori harus isi',
                'category_type_id.required' => 'Tipe Kategori harus pilih',
            ]
        );

        $validatedData['active'] = 1;

        Category::create($validatedData);
        Alert::success('Berhasil', 'Kategori baru berhasil ditambahkan');
        return redirect('webmin/categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name'              =>  'required',
            'slug'              =>  'required',
            'category_type_id'  =>  'required'
        ];

        $validatedData = $request->validate($rules);

        Category::where('id', $category->id)->update($validatedData);
        Alert::success('Berhasil', 'Kategori berhasil diperbaharui');
        return redirect('webmin/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        Alert::success('Berhasil', 'Kategori berhasil dihapus');
        return redirect('webmin/categories');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Categories::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
