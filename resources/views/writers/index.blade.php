@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Penulis</h2>
    <a href="{{ route('writers.create') }}" class="btn btn-primary">Tambah Penulis</a>
</div>
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0 align-middle">
            <thead class="table-dark">
                <tr>
                    <th width="10%">Foto</th>
                    <th width="20%">Nama</th>
                    <th width="20%">Email</th>
                    <th width="35%">Bio</th>
                    <th width="15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($writers as $writer)
                <tr>
                    <td>
                        @if($writer->photo)
                            <img src="{{ asset('storage/' . $writer->photo) }}" class="rounded-circle" width="50" height="50" style="object-fit: cover;">
                        @else
                            <div class="bg-secondary rounded-circle text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">N/A</div>
                        @endif
                    </td>
                    <td><strong>{{ $writer->name }}</strong></td>
                    <td>{{ $writer->email }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($writer->bio, 60) ?? '-' }}</td>
                    <td class="text-center">
                        <form action="{{ route('writers.destroy', $writer->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            <a href="{{ route('writers.edit', $writer->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">Belum ada data penulis.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection