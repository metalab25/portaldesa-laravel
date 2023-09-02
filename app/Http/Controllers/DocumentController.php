<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.webmin.documents.index', [
            'user'          =>  Auth::user(),
            'desa'          =>  Desa::find(1),
            'config'        =>  Config::find(1),
            // 'dinamis'       =>  Category::orderBy('name', 'asc')->where('category_type_id', 1)->get(),
            'documents'     =>  Document::latest()->where('doc_type_id', 2)->get()
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
        //
    }

    public function storePublicDoc(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name'              =>  'required',
                'slug'              =>  'required|unique:documents',
                'attach'            =>  'mimetypes:application/pdf|max:4096'
            ],
            [
                'name.required'     => 'Nama dokumen harus isi',
                'slug.required'     => 'Slug dokumen harus isi',
                'attach.mimetypes'  => 'Lampiran dokumen harus berupa PDF'
            ]
        );

        if ($request->file('attach')) {
            $validatedData['attach'] = $request->file('attach')->store('attach');
        }

        $validatedData['doc_type_id']   = 2;
        $validatedData['user_id']       = auth()->user()->id;

        // dd($validatedData);

        Document::create($validatedData);
        Alert::success('Berhasil', 'Dokumen baru berhasil ditambahkan');
        return redirect('webmin/documents');
    }

    /**
     * Display the specified resource.
     */
    // public function show($attach)
    // {
    //     $document = Document::firstWhere('attach', $attach);
    //     $document = $document;
    // }

    public function download(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        if ($document->attach) {
            Storage::delete([$document->attach]);
        }

        Document::destroy($document->id);
        Alert::success('Berhasil', 'Dokumen berhasil dihapus');
        return redirect('webmin/documents');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Document::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
