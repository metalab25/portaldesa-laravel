<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.webmin.articles.index', [
            'user'          =>  Auth::user(),
            'desa'          =>  Desa::find(1),
            'config'        =>  Config::find(1),
            'dinamis'       =>  Category::orderBy('name', 'asc')->where('category_type_id', 1)->get(),
            'articles'      =>  Article::orderBy('created_at', 'asc')->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.webmin.articles.add', [
            'user'          => Auth::user(),
            'desa'          => Desa::find(1),
            'config'        => Config::find(1),
            'categories'    => Category::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'category_id'   =>  'required',
                'title'         =>  'required',
                'slug'          =>  'required|unique:articles',
                'body'          =>  'required',
            ],
            [
                'category_id.required'  =>  'Kategori harus dipilih',
                'title.required'        =>  'Judul harus diisi',
                'slug.required'         =>  'Slug harus diisi',
                'body.required'         =>  'Isi artikel harus diisi',
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

        $validatedData['user_id']               = auth()->user()->id;
        $validatedData['excerpt']               = Str::limit(strip_tags($request->body), 200);
        $validatedData['caption_image']         = $request->caption_image;
        $validatedData['caption_image1']        = $request->caption_image1;
        $validatedData['caption_image2']        = $request->caption_image2;
        $validatedData['caption_image3']        = $request->caption_image3;
        $validatedData['link_embed']            = $request->link_embed;
        $validatedData['sumber_berita']         = $request->sumber_berita;
        $validatedData['link_sumber_berita']    = $request->link_sumber_berita;
        $validatedData['tgl_agenda']            = $request->tgl_agenda;

        // dd($validatedData);

        Article::create($validatedData);
        Alert::success('Berhasil', 'Artikel baru berhasil ditambahkan');
        return redirect('webmin/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->increment('views');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        Alert::success('Berhasil', 'Artikel berhasil dihapus');
        return redirect('webmin/posts');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function status(Article $article, $id)
    {
        $article = Article::find($id);
        $data = ($article->status == 1) ? 0 : 1;
        $article->update(['status' => $data]);
        Alert::success('Berhasil', 'Status artikel berhasil diubah');
        return redirect('webmin/posts');
    }

    public function comment(Article $article, $id)
    {
        $article = Article::find($id);
        $data = ($article->komentar == 1) ? 0 : 1;
        $article->update(['komentar' => $data]);
        Alert::success('Berhasil', 'Status komentar artikel berhasil diubah');
        return redirect('webmin/posts');
    }
}
