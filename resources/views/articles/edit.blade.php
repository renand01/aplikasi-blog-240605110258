@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h2>Edit Artikel</h2>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="writer_id" class="form-label">Penulis</label>
                    <select class="form-select @error('writer_id') is-invalid @enderror" id="writer_id" name="writer_id">
                        @foreach($writers as $writer)
                            <option value="{{ $writer->id }}" {{ old('writer_id', $article->writer_id) == $writer->id ? 'selected' : '' }}>{{ $writer->name }}</option>
                        @endforeach
                    </select>
                    @error('writer_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Judul Artikel</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $article->title) }}">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Konten / Isi Artikel</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="8">{{ old('content', $article->content) }}</textarea>
                @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-4" style="max-width: 400px;">
                <label for="image" class="form-label">Gambar Sampul</label>
                @if($article->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $article->image) }}" width="150" class="rounded">
                    </div>
                @endif
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning px-4">Perbarui</button>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection