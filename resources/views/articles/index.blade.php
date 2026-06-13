@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Artikel</h2>
    <a href="{{ route('articles.create') }}" class="btn btn-primary">Tulis Artikel Baru</a>
</div>
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0 align-middle">
            <thead class="table-dark">
                <tr>
                    <th width="12%">Gambar</th>
                    <th width="25%">Judul Artikel</th>
                    <th width="15%">Kategori</th>
                    <th width="15%">Penulis</th>
                    <th width="18%">Tanggal Dibuat</th>
                    <th width="15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                <tr>
                    <td>
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" class="rounded" width="80" height="50" style="object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white text-center rounded pt-2" style="width: 80px; height: 50px; font-size: 11px;">No Image</div>
                        @endif
                    </td>
                    <td><strong>{{ $article->title }}</strong></td>
                    <td><span class="badge bg-info text-dark">{{ $article->category->name }}</span></td>
                    <td>{{ $article->writer->name }}</td>
                    <td>{{ $article->created_at->format('d M Y, H:i') }}</td>
                    <td class="text-center">
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Belum ada artikel yang diterbitkan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection