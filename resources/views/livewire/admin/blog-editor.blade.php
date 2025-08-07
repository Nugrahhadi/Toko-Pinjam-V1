@section('title', $isEditing ? 'Edit Artikel' : 'Buat Artikel')

<div>
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.blog') }}" 
               class="flex items-center text-gray-600 hover:text-gray-900 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Blog
            </a>
        </div>
        <h1 class="text-2xl font-bold text-gray-900 mt-4">
            {{ $isEditing ? 'Edit Artikel' : 'Buat Artikel Baru' }}
        </h1>
        <p class="text-gray-600 mt-2">
            {{ $isEditing ? 'Perbarui konten artikel yang ada' : 'Tulis artikel baru untuk blog Toko Pinjam' }}
        </p>
    </div>

    <form wire:submit.prevent="save" class="space-y-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Title -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Judul Artikel <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="title"
                           wire:model.live="title"
                           placeholder="Masukkan judul artikel yang menarik..."
                           class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#433592] focus:border-[#433592] transition-colors duration-200 @error('title') border-red-300 @enderror">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                        URL Slug
                    </label>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-500 mr-2">{{ url('/blog') }}/</span>
                        <input type="text" 
                               id="slug"
                               wire:model="slug"
                               placeholder="url-artikel"
                               class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#433592] focus:border-[#433592] transition-colors duration-200">
                    </div>
                    <p class="mt-2 text-xs text-gray-500">URL akan dibuat otomatis dari judul jika dibiarkan kosong</p>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi Singkat
                    </label>
                    <textarea id="description"
                              wire:model="description"
                              rows="3"
                              placeholder="Tulis deskripsi singkat artikel (opsional)..."
                              class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#433592] focus:border-[#433592] transition-colors duration-200 @error('description') border-red-300 @enderror"></textarea>
                    <div class="flex justify-between mt-2">
                        @error('description')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 ml-auto">{{ strlen($description) }}/500 karakter</p>
                    </div>
                </div>

                <!-- Content Editor -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Konten Artikel <span class="text-red-500">*</span>
                    </label>
                    <div class="border border-gray-300 rounded-lg overflow-hidden">
                        <!-- Toolbar -->
                        <div class="bg-gray-50 border-b border-gray-300 p-3 flex items-center space-x-2 flex-wrap">
                            <button type="button" 
                                    onclick="formatText('bold')"
                                    class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-200 rounded transition-colors duration-200"
                                    title="Bold">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 4v2a1 1 0 001 1h1a3 3 0 010 6H6a1 1 0 00-1 1v2a1 1 0 001 1h2a5 5 0 000-10H6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <button type="button" 
                                    onclick="formatText('italic')"
                                    class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-200 rounded transition-colors duration-200"
                                    title="Italic">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8 16H6a1 1 0 01-1-1v-2a1 1 0 011-1h1.5L6.5 8H5a1 1 0 01-1-1V5a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1H6.5L8.5 12H10a1 1 0 011 1v2a1 1 0 01-1 1z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div class="w-px h-6 bg-gray-300"></div>
                            <button type="button" 
                                    onclick="formatText('formatBlock', '<h2>')"
                                    class="px-3 py-2 text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-200 rounded transition-colors duration-200">
                                H2
                            </button>
                            <button type="button" 
                                    onclick="formatText('formatBlock', '<h3>')"
                                    class="px-3 py-2 text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-200 rounded transition-colors duration-200">
                                H3
                            </button>
                            <div class="w-px h-6 bg-gray-300"></div>
                            <button type="button" 
                                    onclick="formatText('insertUnorderedList')"
                                    class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-200 rounded transition-colors duration-200"
                                    title="Bullet List">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <button type="button" 
                                    onclick="formatText('insertOrderedList')"
                                    class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-200 rounded transition-colors duration-200"
                                    title="Numbered List">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Editor -->
                        <div contenteditable="true"
                             id="contentEditor"
                             wire:ignore
                             class="min-h-[400px] p-4 focus:outline-none focus:ring-2 focus:ring-[#433592] focus:ring-inset"
                             style="white-space: pre-wrap;"
                             placeholder="Mulai menulis artikel Anda di sini..."></div>
                    </div>
                    <textarea wire:model="content" class="hidden" id="contentHidden"></textarea>
                    @error('content')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-xs text-gray-500">Minimal 50 karakter diperlukan</p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Publish Options -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Publikasi</h3>
                    
                    <!-- Status -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select wire:model="status" 
                                class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#433592] focus:border-[#433592] transition-colors duration-200">
                            <option value="draft">Draft</option>
                            <option value="published">Terbit</option>
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        <button type="button" 
                                wire:click="saveDraft"
                                class="w-full px-4 py-2 bg-gray-200 text-gray-800 font-medium rounded-lg hover:bg-gray-300 transition-colors duration-200">
                            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            Simpan Draft
                        </button>
                        
                        <button type="button" 
                                wire:click="publish"
                                class="w-full px-4 py-2 bg-gradient-to-r from-[#433592] to-[#5B4B8A] text-white font-medium rounded-lg hover:from-[#3A2D7E] hover:to-[#4F4076] transition-all duration-200">
                            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $isEditing ? 'Update & Publikasikan' : 'Publikasikan' }}
                        </button>

                        <button type="button" 
                                wire:click="cancel"
                                class="w-full px-4 py-2 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            Batal
                        </button>
                    </div>
                </div>

                <!-- Writing Tips -->
                <div class="bg-blue-50 rounded-xl border border-blue-200 p-6">
                    <h3 class="text-sm font-semibold text-blue-900 mb-3">Tips Menulis</h3>
                    <ul class="text-sm text-blue-800 space-y-2">
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Gunakan judul yang menarik dan deskriptif
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Bagi konten dengan heading dan paragraf
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Simpan sebagai draft sebelum publikasi
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Periksa kembali sebelum publikasi
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const editor = document.getElementById('contentEditor');
    const hiddenTextarea = document.getElementById('contentHidden');
    
    // Load existing content
    const existingContent = @json($content);
    if (existingContent) {
        editor.innerHTML = existingContent;
    }
    
    // Update hidden textarea when content changes
    editor.addEventListener('input', function() {
        hiddenTextarea.value = editor.innerHTML;
        @this.set('content', editor.innerHTML);
    });
    
    // Handle placeholder
    if (!editor.textContent.trim()) {
        editor.classList.add('empty');
    }
    
    editor.addEventListener('focus', function() {
        if (editor.classList.contains('empty')) {
            editor.classList.remove('empty');
        }
    });
    
    editor.addEventListener('blur', function() {
        if (!editor.textContent.trim()) {
            editor.classList.add('empty');
        }
    });
});

function formatText(command, value = null) {
    document.execCommand(command, false, value);
    document.getElementById('contentEditor').focus();
    
    // Update the content
    const editor = document.getElementById('contentEditor');
    const hiddenTextarea = document.getElementById('contentHidden');
    hiddenTextarea.value = editor.innerHTML;
    @this.set('content', editor.innerHTML);
}
</script>
@endpush

@push('styles')
<style>
#contentEditor.empty::before {
    content: 'Mulai menulis artikel Anda di sini...';
    color: #9CA3AF;
    pointer-events: none;
}

#contentEditor {
    outline: none;
}

#contentEditor h2 {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 1rem 0 0.5rem 0;
}

#contentEditor h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin: 1rem 0 0.5rem 0;
}

#contentEditor p {
    margin: 0.5rem 0;
    line-height: 1.6;
}

#contentEditor ul, #contentEditor ol {
    margin: 0.5rem 0;
    padding-left: 1.5rem;
}

#contentEditor li {
    margin: 0.25rem 0;
}

#contentEditor strong {
    font-weight: 600;
}

#contentEditor em {
    font-style: italic;
}
</style>
@endpush
