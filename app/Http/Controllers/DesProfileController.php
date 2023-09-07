<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DesProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Config::find(1);

        return view('dashboard.desa.profiles.index', [
            'user'          => Auth::user(),
            'desa'          => Desa::find(1),
            'config'        => $data,
            'profiles'      => Article::where('category_id', 5)->filter(request(['search']))->paginate(12)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.desa.profiles.add', [
            'user'          => Auth::user(),
            'desa'          => Desa::find(1),
            'config'        => Config::find(1),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title'         =>  'required',
                'slug'          =>  'required|unique:articles',
                'body'          =>  'required',
                'attach'        =>  'mimetypes:application/pdf|max:4096',
            ],
            [
                'title.required'        =>  'Judul harus diisi',
                'slug.required'         =>  'Slug harus diisi',
                'body.required'         =>  'Isi artikel harus diisi',
                'attach.mimetypes'      => 'Lampiran peraturan harus berupa PDF'
            ]
        );

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        if ($request->file('image1')) {
            $validatedData['image1'] = $request->file('image1')->store('post-images');
        }
        if ($request->file('image2')) {
            $validatedData['image2'] = $request->file('image2')->store('post-images');
        }
        if ($request->file('image3')) {
            $validatedData['image3'] = $request->file('image3')->store('post-images');
        }
        if ($request->file('link_dokumen')) {
            $validatedData['link_dokumen'] = $request->file('link_dokumen')->store('attach');
        }

        $validatedData['category_id']           = 5;
        $validatedData['user_id']               = auth()->user()->id;
        $validatedData['excerpt']               = Str::limit(strip_tags($request->body), 200);
        $validatedData['caption_image']         = $request->caption_image;
        $validatedData['caption_image1']        = $request->caption_image1;
        $validatedData['caption_image2']        = $request->caption_image2;
        $validatedData['caption_image3']        = $request->caption_image3;
        $validatedData['link_embed']            = $request->link_embed;
        $validatedData['sumber_berita']         = $request->sumber_berita;
        $validatedData['link_sumber_berita']    = $request->link_sumber_berita;

        // dd($validatedData);

        Article::create($validatedData);
        Alert::success('Berhasil', 'Profile baru berhasil ditambahkan');
        return redirect('desa/profile');
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
    public function edit($id)
    {
        $profile = Article::where('id', $id)->firstOrFail();
        return view('dashboard.desa.profiles.edit', [
            'user'          =>  Auth::user(),
            'config'        =>  Config::find(1),
            'desa'          =>  Desa::find(1),
            'profile'       =>  $profile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = $request->validate(
            [
                'title'         =>  'required',
                'slug'          =>  'required',
                'body'          =>  'required',
                'link_dokumen'  =>  'mimetypes:application/pdf|max:4096',
            ],
            [
                'title.required'            =>  'Judul harus diisi',
                'slug.required'             =>  'Slug harus diisi',
                'body.required'             =>  'Isi artikel harus diisi',
                'link_dokumen.mimetypes'    => 'Lampiran peraturan harus berupa PDF'
            ]
        );

        $validatedData = $rules;

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        if ($request->file('image1')) {
            if ($request->oldImage1) {
                Storage::delete($request->oldImage1);
            }
            $validatedData['image1'] = $request->file('image1')->store('post-images');
        }
        if ($request->file('image2')) {
            if ($request->oldImage2) {
                Storage::delete($request->oldImage2);
            }
            $validatedData['image2'] = $request->file('image2')->store('post-images');
        }
        if ($request->file('image3')) {
            if ($request->oldImage3) {
                Storage::delete($request->oldImage3);
            }
            $validatedData['image3'] = $request->file('image3')->store('post-images');
        }
        if ($request->file('link_dokumen')) {
            if ($request->oldAttach) {
                Storage::delete($request->oldAttach);
            }
            $validatedData['link_dokumen'] = $request->file('link_dokumen')->store('attach');
        }

        $validatedData['category_id']           = 5;
        $validatedData['komentar']              = 0;
        $validatedData['user_id']               = auth()->user()->id;
        $validatedData['excerpt']               = Str::limit(strip_tags($request->body), 200);
        $validatedData['caption_image']         = $request->caption_image;
        $validatedData['caption_image1']        = $request->caption_image1;
        $validatedData['caption_image2']        = $request->caption_image2;
        $validatedData['caption_image3']        = $request->caption_image3;
        $validatedData['link_embed']            = $request->link_embed;
        $validatedData['sumber_berita']         = $request->sumber_berita;
        $validatedData['link_sumber_berita']    = $request->link_sumber_berita;
        $validatedData['dokumen']               = $request->dokumen;

        Article::where('id', $id)->update($validatedData);
        Alert::success('Berhasil', 'Profile berhasil diubah');
        return redirect('desa/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->link_dokumen) {
            Storage::delete([$article->link_dokumen]);
        }
        if ($article->image) {
            Storage::delete([$article->image]);
        }
        if ($article->image1) {
            Storage::delete([$article->image1]);
        }
        if ($article->image2) {
            Storage::delete([$article->image2]);
        }
        if ($article->image3) {
            Storage::delete([$article->image3]);
        }

        Article::destroy($article->id);
        Alert::success('Berhasil', 'Profile berhasil dihapus');
        return redirect('desa/profile');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
