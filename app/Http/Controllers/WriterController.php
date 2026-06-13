<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WriterController extends Controller
{
    public function index()
    {
        $writers = Writer::all();
        return view('writers.index', compact('writers'));
    }

    public function create()
    {
        return view('writers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:writers,email',
            'bio' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah jadi foto
        ]);

        $data = $request->all();

        // Ganti photo menjadi foto
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('writers', 'public');
        }

        Writer::create($data);

        return redirect()->route('writers.index')->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function show(Writer $writer)
    {
        return view('writers.show', compact('writer'));
    }

    public function edit(Writer $writer)
    {
        return view('writers.edit', compact('writer'));
    }

    public function update(Request $request, Writer $writer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:writers,email,' . $writer->id,
            'bio' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah jadi foto
        ]);

        $data = $request->all();

        // Ganti photo menjadi foto
        if ($request->hasFile('foto')) {
            if ($writer->foto && \Illuminate\Support\Facades\Storage::disk('public')->exists($writer->foto)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($writer->foto);
            }
            $data['foto'] = $request->file('foto')->store('writers', 'public');
        }

        $writer->update($data);

        return redirect()->route('writers.index')->with('success', 'Penulis berhasil diperbarui.');
    }

    public function destroy(Writer $writer)
    {
        if ($writer->photo) {
            Storage::disk('public')->delete($writer->photo);
        }
        $writer->delete();
        return redirect()->route('writers.index')->with('success', 'Penulis berhasil dihapus.');
    }
}