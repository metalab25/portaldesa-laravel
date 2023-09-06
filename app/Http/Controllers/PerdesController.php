<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\Document;
use App\Models\Pamong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PerdesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data   = Config::find(1);
        $perdes = Document::all()->map(fn ($dok) => $dok->created_at->year);

        return view('dashboard.sekretariat.perdes.index', [
            'user'          => Auth::user(),
            'desa'          => Desa::find(1),
            'config'        => $data,
            'peraturan'     => Document::latest()->where('doc_type_id', 3)->filter(request(['search']))->paginate(12)->withQueryString(),
            'years'         => $perdes->map,
            'pamong'        => Pamong::all()->where('status', 1)
        ]);
    }

    public function cetakLaporan()
    {
        $data   = Config::find(1);

        return view('dashboard.sekretariat.perdes.cetak', [
            'user'          => Auth::user(),
            'desa'          => Desa::find(1),
            'config'        => $data,
            // 'peraturan'     => Document::latest()->where('doc_type_id', 3)->filter(request(['search']))->paginate(12)->withQueryString(),
            'pamong'        => Pamong::all()->where('status', 1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Config::find(1);

        return view('dashboard.sekretariat.perdes.add', [
            'user'          => Auth::user(),
            'desa'          => Desa::find(1),
            'config'        => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name'                      =>  'required',
                'slug'                      =>  'required|unique:documents',
                'attach'                    =>  'mimetypes:application/pdf|max:4096',
                'jenis'                     =>  'required',
                'no_tetapan'                =>  'required',
                'tgl_tetapan'               =>  'required',
                'tgl_sepakat'               =>  'required',
                'no_laporkan'               =>  'required',
                'tgl_laporkan'              =>  'required',
                'no_lembaran_diundangkan'   =>  'required',
                'tgl_lembaran_diundangkan'  =>  'required',
                'no_berita_diundangkan'     =>  'required',
                'tgl_berita_diundangkan'    =>  'required'
            ],
            [
                'name.required'                     => 'Nama peraturan harus isi',
                'slug.required'                     => 'Slug peraturan harus isi',
                'jenis.required'                    => 'Jenis peraturan harus isi',
                'no_tetapan.required'               => 'Nomor peraturan harus isi',
                'tgl_tetapan.required'              => 'Tanggal peraturan harus isi',
                'tgl_sepakat.required'              => 'Tanggal kesepakatan peraturan harus isi',
                'no_laporkan.required'              => 'Nomor dilaporkan peraturan harus isi',
                'tgl_laporkan.required'             => 'Tanggal dilaporkan peraturan harus isi',
                'no_lembaran_diundangkan.required'  => 'Nomor diundangkan dalam lembaran desa harus isi',
                'tgl_lembaran_diundangkan.required' => 'Tanggal diundangkan dalam lembaran desa harus isi',
                'no_berita_diundangkan.required'    => 'Nomor diundangkan dalam berita desa harus isi',
                'rgl_berita_diundangkan.required'   => 'Tanggal diundangkan dalam berita desa harus isi',
                'attach.mimetypes'                  => 'Lampiran peraturan harus berupa PDF'
            ]
        );

        if ($request->file('attach')) {
            $validatedData['attach'] = $request->file('attach')->store('attach');
        }

        $validatedData['short_desc']    = $request->short_desc;
        $validatedData['doc_type_id']   = 3;
        $validatedData['user_id']       = auth()->user()->id;

        // dd($validatedData);

        Document::create($validatedData);
        Alert::success('Berhasil', 'Peraturan baru berhasil ditambahkan');
        return redirect('sekretariat/perdes');
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
    public function update(Request $request, string $id)
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
        Alert::success('Berhasil', 'Peraturan berhasil dihapus');
        return redirect('sekretariat/perdes');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Document::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
