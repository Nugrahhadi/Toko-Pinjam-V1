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

                <!-- Featured Image -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                        Gambar Unggulan
                    </label>
                    
                    <!-- Upload Area -->
                    <div class="relative">
                        <input type="file" wire:model="featured_image" 
                               accept="image/*" id="admin_featured_image_input"
                               class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                               onchange="updateAdminFileDisplay()">
                        
                        <div id="admin-upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-[#433592] hover:bg-gray-50 transition-all @error('featured_image') border-red-300 @enderror">
                            <div class="space-y-3">
                                <div class="text-4xl">🖼️</div>
                                <div id="admin-upload-text">
                                    <p class="text-gray-600 font-medium">
                                        Klik atau seret gambar ke sini
                                    </p>
                                    <p class="text-sm text-gray-400 mt-1">
                                        PNG, JPG, GIF, WEBP hingga 5MB
                                    </p>
                                </div>
                                <div id="admin-file-selected" class="hidden">
                                    <p class="text-green-600 font-medium" id="admin-file-name">
                                        <!-- File name will be displayed here -->
                                    </p>
                                    <p class="text-sm text-green-500 mt-1">
                                        ✓ File siap diupload
                                    </p>
                                </div>
                                <button type="button" 
                                        onclick="document.getElementById('admin_featured_image_input').click()"
                                        class="inline-flex items-center px-4 py-2 bg-[#433592] text-white rounded-lg hover:bg-[#3a2d7e] transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span id="admin-button-text">Pilih Gambar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    @error('featured_image')
                        <p class="text-red-500 text-sm mt-2 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                    
                    <!-- Current Image Preview (for editing) -->
                    @if($isEditing && !empty($current_featured_image))
                        <div class="mt-4 p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini:</h4>
                            <div class="relative w-full max-w-sm">
                                <img src="{{ asset('storage/' . $current_featured_image) }}" 
                                     alt="Current featured image" 
                                     class="w-full h-48 object-cover rounded-lg shadow-sm">
                                <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-20 transition-opacity duration-200 rounded-lg flex items-center justify-center">
                                    <button type="button" 
                                            onclick="document.getElementById('admin_featured_image_input').click()"
                                            class="opacity-0 hover:opacity-100 transition-opacity bg-white text-gray-800 px-3 py-1 rounded text-sm">
                                        Ganti Gambar
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <!-- New Image Preview -->
                    @if ($featured_image)
                        <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium text-green-700">Gambar Baru Dipilih:</h4>
                                    <p class="text-sm text-green-600 mt-1">{{ $featured_image->getClientOriginalName() }}</p>
                                    <div class="mt-3 w-full max-w-sm">
                                        <img src="{{ $featured_image->temporaryUrl() }}" 
                                             alt="New featured image preview" 
                                             class="w-full h-48 object-cover rounded-lg shadow-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Content Editor with Trix -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Konten Artikel <span class="text-red-500">*</span>
                    </label>
                    
                    <!-- Hidden Input for Trix binding -->
                    <input id="admin_article_content" type="hidden" wire:model="content" value="{{ $content ?? '' }}">
                    
                    <!-- Trix Editor Container -->
                    <div wire:ignore>
                        <trix-editor 
                            input="admin_article_content" 
                            placeholder="Mulai menulis artikel di sini... Gunakan toolbar untuk memformat teks."
                            class="@error('content') border-red-500 @enderror admin-trix-editor">
                        </trix-editor>
                    </div>
                    
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

    <!-- Load Trix Editor CSS and JS -->
    {{-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script> --}}
</div>

{{-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css"> --}}


@push('scripts')
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎯 Admin Trix Editor initialization started...');
    
    // Configure Trix with custom headings
    if (typeof Trix !== 'undefined') {
        // Define heading block attributes
        Trix.config.blockAttributes.heading1 = {
            tagName: 'h1',
            terminal: true,
            breakOnReturn: true,
            group: false
        };
        
        Trix.config.blockAttributes.heading2 = {
            tagName: 'h2', 
            terminal: true,
            breakOnReturn: true,
            group: false
        };
        
        Trix.config.blockAttributes.heading3 = {
            tagName: 'h3',
            terminal: true, 
            breakOnReturn: true,
            group: false
        };
        
        Trix.config.blockAttributes.heading4 = {
            tagName: 'h4',
            terminal: true,
            breakOnReturn: true, 
            group: false
        };
    }
    
    // Add custom heading buttons to Trix toolbar
    function addAdminHeadingButtons() {
        const toolbar = document.querySelector('trix-toolbar .trix-button-group--block-tools');
        if (toolbar) {
            // Create heading buttons container
            const headingGroup = document.createElement('span');
            headingGroup.className = 'trix-button-group trix-button-group--heading';
            
            // H1 Button
            const h1Button = document.createElement('button');
            h1Button.type = 'button';
            h1Button.className = 'trix-button trix-button--icon-h1';
            h1Button.setAttribute('data-trix-attribute', 'heading1');
            h1Button.innerHTML = 'H1';
            h1Button.title = 'Heading 1';
            
            // H2 Button
            const h2Button = document.createElement('button');
            h2Button.type = 'button';
            h2Button.className = 'trix-button trix-button--icon-h2';
            h2Button.setAttribute('data-trix-attribute', 'heading2');
            h2Button.innerHTML = 'H2';
            h2Button.title = 'Heading 2';
            
            // H3 Button
            const h3Button = document.createElement('button');
            h3Button.type = 'button';
            h3Button.className = 'trix-button trix-button--icon-h3';
            h3Button.setAttribute('data-trix-attribute', 'heading3');
            h3Button.innerHTML = 'H3';
            h3Button.title = 'Heading 3';
            
            // H4 Button
            const h4Button = document.createElement('button');
            h4Button.type = 'button';
            h4Button.className = 'trix-button trix-button--icon-h4';
            h4Button.setAttribute('data-trix-attribute', 'heading4');
            h4Button.innerHTML = 'H4';
            h4Button.title = 'Heading 4';
            
            // Add buttons to group
            headingGroup.appendChild(h1Button);
            headingGroup.appendChild(h2Button);
            headingGroup.appendChild(h3Button);
            headingGroup.appendChild(h4Button);
            
            // Insert heading group at the beginning of toolbar
            toolbar.parentNode.insertBefore(headingGroup, toolbar);
            
            // Add event listeners for heading buttons
            [h1Button, h2Button, h3Button, h4Button].forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const editor = document.querySelector('.admin-trix-editor');
                    const attribute = this.getAttribute('data-trix-attribute');
                    
                    if (editor.editor) {
                        if (this.classList.contains('trix-active')) {
                            // Remove heading
                            editor.editor.removeCurrentAttribute(attribute);
                        } else {
                            // Remove other headings first
                            ['heading1', 'heading2', 'heading3', 'heading4'].forEach(attr => {
                                if (attr !== attribute) {
                                    editor.editor.removeCurrentAttribute(attr);
                                }
                            });
                            // Apply new heading
                            editor.editor.setCurrentAttribute(attribute, true);
                        }
                        editor.focus();
                    }
                });
            });
        }
    }
    
    // Trix Editor Event Handlers
    const trixEditor = document.querySelector('.admin-trix-editor');
    const hiddenInput = document.querySelector('#admin_article_content');
    
    if (!trixEditor || !hiddenInput) {
        console.error('❌ Admin Trix editor elements not found!');
        return;
    }

    // Initialize editor with existing content
    if (hiddenInput.value) {
        trixEditor.value = hiddenInput.value;
        console.log('📝 Loaded existing content into Admin Trix editor');
    }
    
    // Add heading buttons after editor is ready
    setTimeout(addAdminHeadingButtons, 100);

    // Sync content to Livewire on changes
    function syncToLivewire() {
        const content = trixEditor.value;
        hiddenInput.value = content;
        
        // Update Livewire property
        if (window.Livewire) {
            @this.set('content', content);
        }
        
        console.log('🔄 Admin content synced to Livewire:', content.length + ' characters');
    }

    // Event listeners for content changes
    trixEditor.addEventListener('trix-change', syncToLivewire);
    trixEditor.addEventListener('trix-blur', syncToLivewire);

    console.log('✅ Admin Trix Editor successfully initialized!');
});

// Function to update admin file display when file is selected
function updateAdminFileDisplay() {
    const fileInput = document.getElementById('admin_featured_image_input');
    const uploadText = document.getElementById('admin-upload-text');
    const fileSelected = document.getElementById('admin-file-selected');
    const fileName = document.getElementById('admin-file-name');
    const buttonText = document.getElementById('admin-button-text');
    const uploadArea = document.getElementById('admin-upload-area');

    if (fileInput.files && fileInput.files[0]) {
        const file = fileInput.files[0];
        
        // Hide upload text and show file selected
        uploadText.classList.add('hidden');
        fileSelected.classList.remove('hidden');
        
        // Update file name
        fileName.textContent = `📎 ${file.name}`;
        
        // Update button text
        buttonText.textContent = 'Ganti Gambar';
        
        // Update upload area styling
        uploadArea.classList.remove('border-dashed', 'border-gray-300');
        uploadArea.classList.add('border-solid', 'border-green-300', 'bg-green-50');
    }
}

// Function to reset admin file display
function resetAdminFileDisplay() {
    const uploadText = document.getElementById('admin-upload-text');
    const fileSelected = document.getElementById('admin-file-selected');
    const buttonText = document.getElementById('admin-button-text');
    const uploadArea = document.getElementById('admin-upload-area');
    const fileInput = document.getElementById('admin_featured_image_input');

    // Reset file input
    if (fileInput) {
        fileInput.value = '';
    }

    // Show upload text and hide file selected
    uploadText.classList.remove('hidden');
    fileSelected.classList.add('hidden');
    
    // Reset button text
    buttonText.textContent = 'Pilih Gambar';
    
    // Reset upload area styling
    uploadArea.classList.remove('border-solid', 'border-green-300', 'bg-green-50');
    uploadArea.classList.add('border-dashed', 'border-gray-300');
}
</script>
@endpush

@push('styles')
<style>
/* Admin Trix Editor Styling */
.admin-trix-editor {
    border: 1px solid #d1d5db !important;
    border-radius: 0 0 0.5rem 0.5rem !important;
    padding: 1rem !important;
    min-height: 400px !important;
    font-size: 16px !important;
    line-height: 1.6 !important;
    background: white !important;
    border-top: none !important;
}

/* Admin Trix Editor Headings */
.admin-trix-editor h1 {
    font-size: 2.25rem !important;
    font-weight: 700 !important;
    margin-top: 1.5rem !important;
    margin-bottom: 1rem !important;
    color: #1f2937 !important;
    border-bottom: 2px solid #e5e7eb !important;
    padding-bottom: 0.5rem !important;
}

.admin-trix-editor h2 {
    font-size: 1.875rem !important;
    font-weight: 600 !important;
    margin-top: 1.25rem !important;
    margin-bottom: 0.875rem !important;
    color: #374151 !important;
}

.admin-trix-editor h3 {
    font-size: 1.5rem !important;
    font-weight: 600 !important;
    margin-top: 1rem !important;
    margin-bottom: 0.75rem !important;
    color: #4b5563 !important;
}

.admin-trix-editor h4 {
    font-size: 1.25rem !important;
    font-weight: 500 !important;
    margin-top: 0.875rem !important;
    margin-bottom: 0.625rem !important;
    color: #6b7280 !important;
}

trix-toolbar {
    border: none !important;
    border-radius: 0.5rem !important;
    background: #ffffff !important;
    padding: 1rem !important;
    display: flex !important;
    flex-wrap: wrap !important;
    align-items: center !important;
    gap: 0.5rem !important;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1) !important;
    margin-bottom: 0 !important;
}

/* Trix toolbar buttons */
trix-toolbar .trix-button-group {
    display: flex !important;
    align-items: center !important;
    margin: 0 !important;
    background: #f8fafc !important;
    border: 1px solid #e2e8f0 !important;
    border-radius: 0.5rem !important;
    padding: 0.25rem !important;
}

/* Custom heading button group */
trix-toolbar .trix-button-group--heading {
    background: #faf5ff !important;
    border: 1px solid #e9d5ff !important;
    border-radius: 0.5rem !important;
    padding: 0.25rem !important;
    margin: 0 !important;
}

trix-toolbar .trix-button {
    background: transparent !important;
    border: none !important;
    border-radius: 0.375rem !important;
    margin: 0.125rem !important;
    padding: 0.5rem 0.75rem !important;
    color: #374151 !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    min-width: 36px !important;
    height: 36px !important;
}

/* Heading buttons special styling */
trix-toolbar .trix-button-group--heading .trix-button {
    background: transparent !important;
    color: #433592 !important;
    font-weight: 600 !important;
    min-width: 40px !important;
    height: 36px !important;
}

trix-toolbar .trix-button:hover {
    background: #f1f5f9 !important;
    color: #1e293b !important;
}

trix-toolbar .trix-button-group--heading .trix-button:hover {
    background: #f3e8ff !important;
    color: #6b21a8 !important;
}

trix-toolbar .trix-button.trix-active {
    background: #433592 !important;
    color: white !important;
}

trix-toolbar .trix-button-group--heading .trix-button.trix-active {
    background: #433592 !important;
    color: white !important;
    box-shadow: 0 1px 2px rgba(67, 53, 146, 0.3) !important;
}

.admin-trix-editor:focus {
    border-color: #433592 !important;
    outline: none !important;
    box-shadow: 0 0 0 3px rgba(67, 53, 146, 0.1) !important;
}

trix-toolbar .trix-dialogs {
    background: white !important;
    border: 1px solid #d1d5db !important;
    border-radius: 0.5rem !important;
    box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1) !important;
}
</style>
@endpush
