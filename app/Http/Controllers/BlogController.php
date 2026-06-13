<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\KategoriArtikel;

class BlogController extends Controller
{
    /**
     * Display the main page for visitors.
     */
    public function index(Request $request)
    {
        $activeCategoryId = $request->query('kategori');

        // Fetch all categories with their respective article counts
        $categories = KategoriArtikel::withCount('artikel')
            ->orderBy('nama_kategori', 'asc')
            ->get();

        // Get total article count for "Semua Artikel"
        $totalArticlesCount = Artikel::count();

        // Query for articles
        $articlesQuery = Artikel::with(['penulis', 'kategori']);

        if ($activeCategoryId) {
            $articlesQuery->where('id_kategori', $activeCategoryId);
        }

        // Fetch the 5 latest articles
        $articles = $articlesQuery->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('visitor.index', compact('articles', 'categories', 'totalArticlesCount', 'activeCategoryId'));
    }

    /**
     * Display the detail page for a single article.
     */
    public function show($id)
    {
        // Fetch article along with author and category details
        $article = Artikel::with(['penulis', 'kategori'])->findOrFail($id);

        // Fetch up to 5 related articles from the same category, excluding the current article
        $relatedArticles = Artikel::where('id_kategori', $article->id_kategori)
            ->where('id', '!=', $article->id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('visitor.show', compact('article', 'relatedArticles'));
    }
}
