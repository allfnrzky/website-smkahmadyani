@extends('layouts.admin')
@section('title', 'Kelola Berita - Tambah Baru')

@section('content')
<div class="bg-white rounded-2xl shadow-sm p-8 max-w-4xl">

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="form-berita">
        @csrf
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Judul Berita</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-[#8B5CF6] focus:border-[#8B5CF6]" required>
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Konten Berita</label>
            <textarea name="konten" id="editor" rows="8" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-[#8B5CF6] focus:border-[#8B5CF6]"></textarea>
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Gambar Sampul</label>
            <input type="file" name="gambar" id="gambar" onchange="previewImage(this)" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100" required>
            <div id="preview-container" class="mt-4 hidden">
                <img id="preview" class="w-60 h-36 object-cover rounded-xl border shadow-sm">
                <button type="button" onclick="removePreview()" class="mt-2 text-xs text-red-500 hover:text-red-700 font-bold">&times; Hapus</button>
            </div>
        </div>

        <div id="form-error" class="hidden p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg text-sm"></div>

        <div class="pt-4">
            <button type="submit" id="btn-submit" class="bg-[#8B5CF6] text-white px-8 py-3 rounded-xl font-bold hover:bg-[#7C3AED] transition disabled:opacity-50 disabled:cursor-not-allowed">Terbitkan Berita</button>
            <a href="{{ route('admin.berita.index') }}" class="ml-4 text-gray-500 font-semibold">Batal</a>
        </div>
    </form>
</div>

<script>
const ALLOWED_TYPES = ['image/jpeg', 'image/png', 'image/jpg'];
const ALLOWED_EXT = /\.(jpe?g|png)$/i;

function previewImage(input) {
    const file = input.files && input.files[0];
    if (!file) return;
    if (!ALLOWED_TYPES.includes(file.type) || !ALLOWED_EXT.test(file.name)) {
        alert('Gambar sampul harus berupa file PNG, JPG, atau JPEG.');
        input.value = '';
        document.getElementById('preview-container').classList.add('hidden');
        return;
    }
    const container = document.getElementById('preview-container');
    const preview = document.getElementById('preview');
    const reader = new FileReader();
    reader.onload = e => { preview.src = e.target.result; container.classList.remove('hidden'); };
    reader.readAsDataURL(input.files[0]);
}
function removePreview() {
    document.getElementById('preview-container').classList.add('hidden');
    document.querySelector('input[name="gambar"]').value = '';
}

// --- CKEditor Custom Image Upload Adapter ---
class BeritaUploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }
    upload() {
        return this.loader.file.then(file => new Promise((resolve, reject) => {
            const formData = new FormData();
            formData.append('upload', file);
            fetch('{{ route("admin.berita.upload-image") }}', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                body: formData
            })
            .then(res => res.json())
            .then(res => {
                if (res.url) resolve({ default: res.url });
                else reject(res.error || 'Upload gagal');
            })
            .catch(reject);
        }));
    }
    abort() {}
}

function BeritaUploadAdapterPlugin(editor) {
    if (editor.plugins.has('FileRepository')) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new BeritaUploadAdapter(loader);
        };
    }
}

let editorInstance = null;

ClassicEditor
    .create(document.getElementById('editor'), {
        extraPlugins: [BeritaUploadAdapterPlugin],
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'bulletedList', 'numberedList', '|',
                'alignment', '|',
                'link', 'uploadImage', 'mediaEmbed', '|',
                'blockQuote', 'insertTable', '|',
                'undo', 'redo'
            ]
        },
        mediaEmbed: {
            previewsInData: true
        },
        image: {
            toolbar: ['imageTextAlternative', 'imageStyle:inline', 'imageStyle:block', 'imageStyle:side']
        },
        table: {
            contentToolbar: [
                'tableColumn', 'tableRow', 'mergeTableCells',
                'tableProperties', 'tableCellProperties'
            ],
            tableProperties: {
                properties: {
                    width: true,
                    height: true,
                    borderStyle: true,
                    borderColor: true,
                    borderWidth: true,
                    backgroundColor: true,
                    alignment: true
                }
            },
            tableCellProperties: {
                properties: {
                    width: true,
                    height: true,
                    borderStyle: true,
                    borderColor: true,
                    borderWidth: true,
                    backgroundColor: true,
                    horizontalAlignment: true,
                    verticalAlignment: true
                }
            }
        }
    })
    .then(editor => {
        editorInstance = editor;
    })
    .catch(error => {
        console.error('CKEditor error:', error);
        document.getElementById('form-error').textContent = 'Gagal memuat editor konten. Refresh halaman atau hubungi admin.';
        document.getElementById('form-error').classList.remove('hidden');
    });

// Form submission handling
document.getElementById('form-berita').addEventListener('submit', function(e) {
    const btn = document.getElementById('btn-submit');
    const errorDiv = document.getElementById('form-error');
    errorDiv.classList.add('hidden');

    if (editorInstance) {
        editorInstance.updateSourceElement();
    }

    const gambarInput = document.getElementById('gambar');
    const judul = document.getElementById('judul').value.trim();
    const konten = editorInstance ? editorInstance.getData().trim() : document.getElementById('editor').value.trim();

    let errors = [];
    if (!judul) errors.push('Judul berita harus diisi.');
    if (!konten) errors.push('Konten berita harus diisi.');

    const file = gambarInput.files && gambarInput.files[0];
    if (!file) errors.push('Gambar sampul harus dipilih.');
    else if (!ALLOWED_TYPES.includes(file.type) || !ALLOWED_EXT.test(file.name))
        errors.push('Gambar sampul harus berupa file PNG, JPG, atau JPEG.');

    if (errors.length > 0) {
        e.preventDefault();
        errorDiv.innerHTML = '<ul class="list-disc ml-4">' + errors.map(e => '<li>' + e + '</li>').join('') + '</ul>';
        errorDiv.classList.remove('hidden');
        errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
        return;
    }

    btn.disabled = true;
    btn.textContent = 'Menyimpan...';
});
</script>
@endsection