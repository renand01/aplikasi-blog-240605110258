@extends('layouts.visitor')

@section('title', 'Blog Kami - Beranda')

@section('content')
<div class="row">
    <!-- Articles Column -->
    <div class="col-lg-8">
        @forelse($articles as $article)
            <article class="card blog-card">
                <!-- Article Image -->
                @if($article->gambar)
                    <img src="{{ asset('storage/gambar/' . $article->gambar) }}" class="card-img-top blog-card-img" alt="{{ $article->judul }}">
                @else
                    <div style="height: 300px; background-color: #e2e8f0; display: flex; align-items: center; justify-content: center; color: #94a3b8;">
                        <span style="font-size: 1.25rem; font-weight: 500;">Tidak ada gambar</span>
                    </div>
                @endif

                <div class="card-body p-4 p-md-5">
                    <!-- Category Badge -->
                    <div class="mb-3">
                        <a href="{{ route('blog.index', ['kategori' => $article->kategori->id]) }}" class="blog-badge">
                            {{ $article->kategori->nama_kategori }}
                        </a>
                    </div>

                    <!-- Title -->
                    <h2 class="card-title h3 mb-3">
                        <a href="{{ route('blog.show', $article->id) }}" class="blog-title">
                            {{ $article->judul }}
                        </a>
                    </h2>

                    <!-- Author and Date Meta -->
                    <div class="blog-meta mb-4">
                        @if($article->penulis->foto && $article->penulis->foto !== 'No Profile.jpg' && $article->penulis->foto !== 'default.png')
                            <img src="{{ asset('storage/foto/' . $article->penulis->foto) }}" alt="{{ $article->penulis->nama_depan }}" class="author-avatar">
                        @else
                            <div class="author-avatar">
                                {{ strtoupper(substr($article->penulis->nama_depan, 0, 1)) }}
                            </div>
                        @endif
                        <div>
                            <span class="fw-semibold text-dark">{{ $article->penulis->nama_depan }} {{ $article->penulis->nama_belakang }}</span>
                            <span class="text-muted mx-1">&bull;</span>
                            <span class="text-muted">{{ $article->hari_tanggal }}</span>
                        </div>
                    </div>

                    <!-- Summary Content -->
                    <p class="card-text text-muted mb-4" style="line-height: 1.6; font-size: 0.95rem;">
                        {{ Str::limit(strip_tags($article->isi), 180, '...') }}
                    </p>

                    <!-- Read More Button -->
                    <a href="{{ route('blog.show', $article->id) }}" class="btn-read-more">
                        Baca Selengkapnya &rarr;
                    </a>
                </div>
            </article>
        @empty
            <div class="card border-0 shadow-sm text-center py-5 px-4" style="border-radius: 12px;">
                <div class="text-muted mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" class="d-inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h.008v.008H12V7.5zM12 12h.008v.008H12V12zm0 4.5h.008v.008H12v-.008zm-6-9h.008v.008H6V7.5zM6 12h.008v.008H6V12zm0 4.5h.008v.008H6v-.008zm12-9h.008v.008H18V7.5zM18 12h.008v.008H18V12zm0 4.5h.008v.008H18v-.008zM4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15A2.25 2.25 0 002.25 6.75v10.5a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                </div>
                <h4 class="fw-semibold text-dark">Belum ada artikel</h4>
                <p class="text-muted mb-0">Maaf, belum ada artikel yang dipublikasikan dalam kategori ini.</p>
                <div class="mt-4">
                    <a href="{{ route('blog.index') }}" class="btn btn-sm px-4 btn-outline-success" style="border-radius: 50px;">
                        Kembali ke Semua Artikel
                    </a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Sidebar Column -->
    <div class="col-lg-4 mt-4 mt-lg-0">
        <!-- Category Widget -->
        <div class="widget-card">
            <h3 class="widget-title">Kategori Artikel</h3>
            <div class="category-list">
                <!-- All Articles Item -->
                <a href="{{ route('blog.index') }}" class="category-item-link {{ !$activeCategoryId ? 'active' : '' }}">
                    <span>Semua Artikel</span>
                    <span class="category-badge-count">{{ $totalArticlesCount }}</span>
                </a>

                <!-- Custom Categories -->
                @foreach($categories as $category)
                    <a href="{{ route('blog.index', ['kategori' => $category->id]) }}" class="category-item-link {{ $activeCategoryId == $category->id ? 'active' : '' }}">
                        <span>{{ $category->nama_kategori }}</span>
                        <span class="category-badge-count">{{ $category->artikel_count }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
