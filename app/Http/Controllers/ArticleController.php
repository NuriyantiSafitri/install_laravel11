<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Tampilkan daftar artikel (paginate).
     */
    public function index(): View
    {
        $articles = Article::latest()->paginate(10);

        return view('articles.index', compact('articles'));
    }

    /**
     * Tampilkan form pembuatan artikel.
     */
    public function create(): View
    {
        return view('articles.create');
    }

    /**
     * Simpan artikel baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        // pastikan is_published bernilai boolean
        $data['is_published'] = $request->boolean('is_published');

        // jika model tidak otomatis membuat slug, buatkan di sini
        if (empty($data['slug'] ?? null) && ! empty($data['title'])) {
            $data['slug'] = Str::slug($data['title']) . '-' . Str::random(6);
        }

        Article::create($data);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil disimpan.');
    }

    /**
     * Tampilkan satu artikel.
     */
    public function show(Article $article): View
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Tampilkan form edit untuk artikel.
     */
    public function edit(Article $article): View
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update artikel.
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $data = $this->validateData($request, $article->id);

        $data['is_published'] = $request->boolean('is_published');

        // jangan ubah slug otomatis jika sudah ada, kecuali ingin di-generate ulang
        if (empty($data['slug'] ?? null) && ! empty($data['title'])) {
            $data['slug'] = Str::slug($data['title']) . '-' . Str::random(6);
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Artikel diupdate.');
    }

    /**
     * Hapus artikel.
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return back()->with('success', 'Artikel dihapus.');
    }

    /**
     * Validasi input yang dipakai oleh store & update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int|null $ignoreId  id yang diabaikan saat validasi unik (untuk update)
     * @return array
     */
    protected function validateData(Request $request, int $ignoreId = null): array
    {
        // Jika kamu menyertakan field slug di form dan ingin memastikan unik,
        // gunakan rule unique dengan ignore saat update.
        $rules = [
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'body' => 'required|string',
            // 'slug' => 'nullable|string|unique:articles,slug' // contoh jika mau validasi slug
        ];

        return $request->validate($rules);
    }
}
