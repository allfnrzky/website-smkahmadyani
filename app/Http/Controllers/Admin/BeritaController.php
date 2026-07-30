<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index() {
        $berita = Berita::latest()->get();
        return view('admin.berita.index', compact('berita'));
    }

    public function uploadImage(Request $request) {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120'
        ]);

        $path = $request->file('upload')->store('berita/konten', 'public');

        return response()->json([
            'url' => asset('storage/' . $path)
        ]);
    }

    public function create() {
        return view('admin.berita.create');
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            // Custom pesan error agar gampang debug
            'gambar.required' => 'Wajib mengunggah gambar sampul.',
            'gambar.image' => 'File harus berupa gambar.',
        ]);

        try {
            $path = $request->file('gambar')->store('berita', 'public');

            Berita::create([
                'judul' => $request->judul,
                'slug' => \Illuminate\Support\Str::slug($request->judul), // Gunakan full namespace
                'konten' => $request->konten,
                'gambar' => $path,
                'user_id' => auth()->id()
            ]);

            return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Jika gagal, kembali ke form dengan pesan error asli dari database
            return back()->withInput()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    // PERBAIKAN: Ubah $beritum menjadi $berita agar sinkron dengan View
    public function edit(Berita $berita) {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita) 
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,
        ];

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    // PERBAIKAN: Ubah $beritum menjadi $berita
    public function destroy(Berita $berita) {
        if($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}