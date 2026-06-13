@extends('layouts.visitor')

@section('title', $article->judul . ' - Blog Kami')

@section('content')
<!-- Breadcrumbs -->
<div class="breadcrumb-custom">
    <a href="{{ route('blog.index') }}">Beranda</a>
    <span class="mx-2">/</span>
    <a href="{{ route('blog.index', ['kategori' => $article->kategori->id]) }}">{{ $article->kategori->nama_kategori }}</a>
    <span class="mx-2">/</span>
    <span>{{ $article->judul }}</span>
</div>

<div class="row">
    <!-- Article Content Column -->
    <div class="col-lg-8">
        <article class="card border-0 shadow-sm mb-4" style="border-radius: 12px; overflow: hidden;">
            <!-- Article Image -->
            @if($article->gambar)
                <img src="{{ asset('storage/gambar/' . $article->gambar) }}" class="card-img-top img-fluid" alt="{{ $article->judul }}" style="max-height: 480px; width: 100%; object-fit: cover;">
            @else
                <div style="height: 350px; background-color: #e2e8f0; display: flex; align-items: center; justify-content: center; color: #94a3b8;">
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
                <h1 class="fw-bold text-dark mb-3" style="font-size: 2.25rem; line-height: 1.25; letter-spacing: -0.02em;">
                    {{ $article->judul }}
                </h1>

                <!-- Author and Date Meta -->
                <div class="blog-meta mb-4 pb-4 border-bottom">
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

                <!-- Full Content -->
                <div class="article-content text-dark" style="line-height: 1.8; font-size: 1.05rem; text-align: justify;">
                    {!! nl2br(e($article->isi)) !!}
                </div>
            </div>
        </article>
    </div>

    <!-- Related Articles Sidebar Column -->
    <div class="col-lg-4">
        <!-- Related Articles Widget -->
        <div class="widget-card">
            <h3 class="widget-title">Artikel Terkait</h3>
            
            @forelse($relatedArticles as $related)
                <div class="d-flex align-items-start gap-3 mb-3 pb-3 @if(!$loop->last) border-bottom @endif">
                    @if($related->gambar)
                        <img src="{{ asset('storage/gambar/' . $related->gambar) }}" alt="{{ $related->judul }}" style="width: 72px; height: 54px; object-fit: cover; border-radius: 6px; flex-shrink: 0; border: 1px solid #f1f5f9;">
                    @else
                        <div style="width: 72px; height: 54px; background-color: #e2e8f0; border-radius: 6px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 0.65rem;">
                            No Image
                        </div>
                    @endif
                    
                    <div style="min-width: 0;">
                        <h4 class="mb-1" style="font-size: 0.875rem; font-weight: 600; line-height: 1.4;">
                            <a href="{{ route('blog.show', $related->id) }}" class="text-decoration-none text-dark" style="transition: color 0.2s; display: block; overflow: hidden; text-overflow: ellipsis; white-space: normal; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;" onmouseover="this.style.color='#10b981'" onmouseout="this.style.color='#0f172a'">
                                {{ $related->judul }}
                            </a>
                        </h4>
                        <small class="text-muted" style="font-size: 0.75rem;">{{ $related->hari_tanggal }}</small>
                    </div>
                </div>
            @empty
                <p class="text-muted font-italic mb-0" style="font-size: 0.9rem;">Tidak ada artikel terkait dalam kategori ini.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
