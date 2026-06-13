@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h2>Edit Data Penulis</h2>
</div>
<div class="card shadow-sm" style="max-width: 600px;">
    <div class="card-body">
        <form action="{{ route('writers.update', $writer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $writer->name) }}">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $writer->email) }}">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Biografi Singkat</label>
                <textarea class="form-control" id="bio" name="bio" rows="3">{{ old('bio', $writer->bio) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto Profil</label>
                @if($writer->photo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $writer->photo) }}" width="80" height="80" class="rounded" style="object-fit: cover;">
                    </div>
                @endif
                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning">Perbarui</button>
                <a href="{{ route('writers.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection