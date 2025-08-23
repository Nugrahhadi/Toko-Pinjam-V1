<div class="min-h-screen bg-gray-50">
        <!-- Navbar -->
    <livewire:components.navbar />

    <div class="py-8">
    <!-- Trix Editor Custom Styles -->
    <style>
        /* Trix Editor Styling */
        trix-editor {
            border: 1px solid #d1d5db !important;
            border-radius: 0 0 0.5rem 0.5rem !important;
            padding: 1rem !important;
            min-height: 400px !important;
            font-size: 16px !important;
            line-height: 1.6 !important;
            background: white !important;
            border-top: none !important;
        }
        
        /* Trix Editor Headings */
        trix-editor h1 {
            font-size: 2.25rem !important;
            font-weight: 700 !important;
            margin-top: 1.5rem !important;
            margin-bottom: 1rem !important;
            color: #1f2937 !important;
            border-bottom: 2px solid #e5e7eb !important;
            padding-bottom: 0.5rem !important;
        }
        
        trix-editor h2 {
            font-size: 1.875rem !important;
            font-weight: 600 !important;
            margin-top: 1.25rem !important;
            margin-bottom: 0.875rem !important;
            color: #374151 !important;
        }
        
        trix-editor h3 {
            font-size: 1.5rem !important;
            font-weight: 600 !important;
            margin-top: 1rem !important;
            margin-bottom: 0.75rem !important;
            color: #4b5563 !important;
        }
        
        trix-editor h4 {
            font-size: 1.25rem !important;
            font-weight: 500 !important;
            margin-top: 0.875rem !important;
            margin-bottom: 0.625rem !important;
            color: #6b7280 !important;
        }
        
        trix-toolbar {
            border: 1px solid #d1d5db !important;
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
        
        trix-editor:focus {
            border-color: #7c3aed !important;
            outline: none !important;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1) !important;
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
            color: #7c3aed !important;
            font-weight: 600 !important;
            min-width: 40px !important;
            height: 36px !important;
        }
        
        trix-toolbar .trix-button:hover {
            background: #f1f5f9 !important;
            color: #1e293b !important;
            transform: none !important;
        }
        
        trix-toolbar .trix-button-group--heading .trix-button:hover {
            background: #f3e8ff !important;
            color: #6b21a8 !important;
        }
        
        trix-toolbar .trix-button.trix-active {
            background: #7c3aed !important;
            color: white !important;
        }
        
        trix-toolbar .trix-button-group--heading .trix-button.trix-active {
            background: #7c3aed !important;
            color: white !important;
            box-shadow: 0 1px 2px rgba(124, 58, 237, 0.3) !important;
        }
        
        trix-toolbar .trix-dialogs {
            background: white !important;
            border: 1px solid #d1d5db !important;
            border-radius: 0.5rem !important;
            box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1) !important;
        }
        
        /* Responsif container */
        .article-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        
        @media (min-width: 768px) {
            .article-container {
                padding: 0 2rem;
            }
        }
        
        @media (min-width: 1024px) {
            .article-container {
                padding: 0 3rem;
            }
        }
        
        /* Form styling */
        .form-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
            color: white;
        }
        
        .form-body {
            padding: 2rem;
        }
    </style>

    <div class="article-container">
        <!-- Form Card -->
        <div class="form-card">
            <!-- Header -->
            <div class="form-header">
                <h1 class="text-2xl font-bold mb-2">Tulis Artikel Baru</h1>
                <p class="text-blue-100">Bagikan pengetahuan dan pengalaman Anda melalui artikel yang menarik</p>
            </div>

            <!-- Form Body -->
            <div class="form-body">
                <!-- Form -->
                <form wire:submit.prevent="submit" class="space-y-6">
                    <!-- Judul -->
                    <div>
                        <label class="block text-lg font-bold text-gray-700 mb-2">
                            Judul Artikel
                        </label>
                        <input type="text" wire:model="title"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-purple-600 focus:outline-none transition-all @error('title') border-red-500 @enderror"
                               placeholder="Masukkan judul artikel yang menarik...">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-lg font-bold text-gray-700 mb-2">
                            Kategori
                        </label>
                        <select wire:model="category" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-purple-600 focus:outline-none transition-all @error('category') border-red-500 @enderror">
                            <option value="">Pilih kategori artikel</option>
                            <option value="tips">Tips & Trik</option>
                            <option value="tutorial">Tutorial</option>
                            <option value="review">Review</option>
                            <option value="teknologi">Teknologi</option>
                            <option value="lifestyle">Lifestyle</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gambar Unggulan -->
                    <div>
                        <label class="block text-lg font-bold text-gray-700 mb-3">
                            Gambar Unggulan (Opsional)
                        </label>
                        
                        <!-- Upload Area -->
                        <div class="relative">
                            <input type="file" wire:model="featured_image" 
                                   accept="image/*" id="featured_image_input"
                                   class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                                   onchange="updateFileDisplay()">
                            
                            <div id="upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-purple-400 hover:bg-purple-50 transition-all @error('featured_image') border-red-300 @enderror">
                                <div class="space-y-3">
                                    <div class="text-4xl">📸</div>
                                    <div id="upload-text">
                                        <p class="text-gray-600 font-medium">
                                            Klik atau seret gambar ke sini
                                        </p>
                                        <p class="text-sm text-gray-400 mt-1">
                                            PNG, JPG, GIF, WEBP hingga 5MB
                                        </p>
                                    </div>
                                    <div id="file-selected" class="hidden">
                                        <p class="text-green-600 font-medium" id="file-name">
                                            <!-- File name will be displayed here -->
                                        </p>
                                        <p class="text-sm text-green-500 mt-1">
                                            ✓ File siap diupload
                                        </p>
                                    </div>
                                    <button type="button" 
                                            onclick="document.getElementById('featured_image_input').click()"
                                            class="inline-flex items-center px-4 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span id="button-text">Pilih Gambar</span>
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
                        
                        <!-- Preview jika ada gambar -->
                        @if ($featured_image)
                            <div class="mt-3 p-3 bg-green-50 border border-green-200 rounded-lg">
                                <div class="flex items-center text-green-700">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-sm font-medium">Gambar siap diupload: {{ $featured_image->getClientOriginalName() }}</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Isi Artikel dengan Trix Editor -->
                    <div>
                        <label class="block text-lg font-bold text-gray-700 mb-2">
                            Isi Artikel
                        </label>
                        
                        <!-- Hidden Input for Livewire Binding -->
                        <input id="article_content" type="hidden" wire:model="content" value="{{ $content ?? '' }}">
                        
                        <!-- Trix Editor Container -->
                        <div wire:ignore>
                            <trix-editor 
                                input="article_content" 
                                placeholder="Mulai menulis artikel Anda di sini... Gunakan toolbar untuk memformat teks, menambahkan link, dan menyisipkan gambar."
                                class="@error('content') border-red-500 @enderror"
                                data-upload-url="{{ route('upload-content-image') }}"
                                data-csrf-token="{{ csrf_token() }}">
                            </trix-editor>
                        </div>
                        
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        
                        <!-- Help Text -->
                        <div class="mt-3 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                            <h4 class="text-blue-800 font-medium mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                                Tips Penggunaan Editor
                            </h4>
                            <div class="text-blue-700 text-sm space-y-1">
                                <p>• <strong>H1-H4:</strong> Gunakan heading untuk struktur artikel yang jelas</p>
                                <p>• <strong>Format:</strong> Bold, italic, underline untuk penekanan</p>
                                <p>• <strong>Gambar:</strong> Seret & lepas gambar langsung ke editor</p>
                                <p>• <strong>Link:</strong> Tambahkan tautan untuk referensi</p>
                                <p>• <strong>List:</strong> Buat daftar berurut atau tidak berurut</p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-purple-600 to-purple-700 text-white font-semibold px-8 py-3 rounded-lg hover:from-purple-700 hover:to-purple-800 transition-all transform hover:scale-105 shadow-lg">
                            Kirim Artikel
                        </button>
                        <a href="{{ route('blog') }}" 
                           class="flex-1 bg-gray-100 text-gray-700 font-semibold px-8 py-3 rounded-lg hover:bg-gray-200 transition-all text-center border">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Load Trix Editor CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <!-- Sweet Alert for notifications -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Trix Editor Configuration Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🎯 Trix Editor initialization started...');
            
            // Add custom heading buttons to Trix toolbar
            function addHeadingButtons() {
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
                    h1Button.setAttribute('data-trix-key', '1');
                    h1Button.innerHTML = 'H1';
                    h1Button.title = 'Heading 1';
                    
                    // H2 Button
                    const h2Button = document.createElement('button');
                    h2Button.type = 'button';
                    h2Button.className = 'trix-button trix-button--icon-h2';
                    h2Button.setAttribute('data-trix-attribute', 'heading2');
                    h2Button.setAttribute('data-trix-key', '2');
                    h2Button.innerHTML = 'H2';
                    h2Button.title = 'Heading 2';
                    
                    // H3 Button
                    const h3Button = document.createElement('button');
                    h3Button.type = 'button';
                    h3Button.className = 'trix-button trix-button--icon-h3';
                    h3Button.setAttribute('data-trix-attribute', 'heading3');
                    h3Button.setAttribute('data-trix-key', '3');
                    h3Button.innerHTML = 'H3';
                    h3Button.title = 'Heading 3';
                    
                    // H4 Button
                    const h4Button = document.createElement('button');
                    h4Button.type = 'button';
                    h4Button.className = 'trix-button trix-button--icon-h4';
                    h4Button.setAttribute('data-trix-attribute', 'heading4');
                    h4Button.setAttribute('data-trix-key', '4');
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
                            const editor = document.querySelector('trix-editor');
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
            
            // Trix Editor Event Handlers
            const trixEditor = document.querySelector('trix-editor');
            const hiddenInput = document.querySelector('#article_content');
            
            if (!trixEditor || !hiddenInput) {
                console.error('❌ Trix editor elements not found!');
                return;
            }

            // Initialize editor with existing content
            if (hiddenInput.value) {
                trixEditor.value = hiddenInput.value;
                console.log('📝 Loaded existing content into Trix editor');
            }
            
            // Add heading buttons after editor is ready
            setTimeout(addHeadingButtons, 100);

            // Sync content to Livewire on changes
            function syncToLivewire() {
                const content = trixEditor.value;
                hiddenInput.value = content;
                
                // Update Livewire property
                if (window.Livewire) {
                    @this.set('content', content);
                }
                
                console.log('🔄 Content synced to Livewire:', content.length + ' characters');
            }

            // Event listeners for content changes
            trixEditor.addEventListener('trix-change', syncToLivewire);
            trixEditor.addEventListener('trix-blur', syncToLivewire);

            // Custom image upload handler
            trixEditor.addEventListener('trix-attachment-add', function(event) {
                const attachment = event.attachment;
                
                if (attachment.file) {
                    console.log('📸 Image upload started...');
                    uploadImageToServer(attachment);
                }
            });

            // Image upload function
            function uploadImageToServer(attachment) {
                const formData = new FormData();
                formData.append('upload', attachment.file);
                
                fetch('{{ route("upload-content-image") }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.uploaded && data.url) {
                        console.log('✅ Image uploaded successfully:', data.url);
                        attachment.setAttributes({
                            url: data.url,
                            href: data.url
                        });
                        
                        // Show success notification
                        Swal.fire({
                            icon: 'success',
                            title: 'Gambar berhasil diupload!',
                            text: 'Gambar telah ditambahkan ke artikel Anda.',
                            timer: 2000,
                            showConfirmButton: false,
                            position: 'top-end',
                            toast: true
                        });
                    } else {
                        console.error('❌ Upload failed:', data);
                        handleUploadError(attachment, data.error || 'Upload gagal');
                    }
                })
                .catch(error => {
                    console.error('❌ Upload error:', error);
                    handleUploadError(attachment, 'Terjadi kesalahan saat upload gambar');
                });
            }

            // Handle upload errors
            function handleUploadError(attachment, message) {
                attachment.remove();
                
                Swal.fire({
                    icon: 'error',
                    title: 'Upload Gagal',
                    text: message,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ef4444'
                });
            }

            // Form submission handler
            document.querySelector('form').addEventListener('submit', function(e) {
                // Ensure content is synced before submission
                syncToLivewire();
                
                // Show loading indicator
                Swal.fire({
                    title: 'Menyimpan artikel...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        Swal.showLoading();
                    }
                });
            });

            // Debug functions for development
            window.getTrixContent = function() {
                const content = trixEditor.value;
                console.log('📋 Current Trix content:', content);
                return content;
            };

            window.setTrixContent = function(content) {
                trixEditor.value = content;
                syncToLivewire();
                console.log('📝 Content set in Trix editor');
            };

            window.clearTrixContent = function() {
                trixEditor.value = '';
                syncToLivewire();
                console.log('🗑️ Trix content cleared');
            };

            console.log('✅ Trix Editor successfully initialized!');
            console.log('🛠️  Available debug functions: getTrixContent(), setTrixContent(content), clearTrixContent()');
        });

        // Livewire hooks
        document.addEventListener('livewire:navigated', function() {
            // Reinitialize Trix if navigated via Livewire
            console.log('🔄 Livewire navigated - Trix may need reinitialization');
        });

        // Listen for successful form submission
        document.addEventListener('livewire:init', () => {
            @this.on('article-saved', (event) => {
                Swal.close();
                
                Swal.fire({
                    icon: 'success',
                    title: 'Artikel Terkirim! 🎉',
                    text: 'Editor akan review artikel Anda dan akan menerbitkannya',
                    confirmButtonText: 'Lihat Blog',
                    showCancelButton: true,
                    cancelButtonText: 'Tulis Lagi',
                    confirmButtonColor: '#10b981',
                    cancelButtonColor: '#6b7280',
                    timer: 5000,
                    timerProgressBar: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to blog page
                        window.location.href = '{{ route("blog") }}';
                    } else {
                        // Clear form for new article
                        if (typeof window.clearTrixContent === 'function') {
                            window.clearTrixContent();
                        }
                        // Reset file upload display
                        resetFileDisplay();
                    }
                });
            });

            @this.on('article-error', (event) => {
                Swal.close();
                
                Swal.fire({
                    icon: 'error',
                    title: 'Oops! Ada Kesalahan',
                    text: event.message || 'Terjadi kesalahan saat menyimpan artikel. Silakan coba lagi.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ef4444'
                });
            });
        });

        // Function to update file display when file is selected
        function updateFileDisplay() {
            const fileInput = document.getElementById('featured_image_input');
            const uploadText = document.getElementById('upload-text');
            const fileSelected = document.getElementById('file-selected');
            const fileName = document.getElementById('file-name');
            const buttonText = document.getElementById('button-text');
            const uploadArea = document.getElementById('upload-area');

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

        // Function to reset file display
        function resetFileDisplay() {
            const uploadText = document.getElementById('upload-text');
            const fileSelected = document.getElementById('file-selected');
            const buttonText = document.getElementById('button-text');
            const uploadArea = document.getElementById('upload-area');
            const fileInput = document.getElementById('featured_image_input');

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
        
        // Listen for article saved event
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('article-saved', (event) => {
                Swal.fire({
                    title: 'Berhasil!',
                    text: event.message || 'Artikel berhasil disimpan sebagai draft dan menunggu persetujuan admin!',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    position: 'center',
                    toast: false,
                    background: '#fff',
                    customClass: {
                        popup: 'swal2-center-popup'
                    }
                });
                
                // Reset file display after success
                resetFileDisplay();
            });
            
            Livewire.on('article-error', (event) => {
                Swal.fire({
                    title: 'Error!',
                    text: event.message || 'Terjadi kesalahan saat menyimpan artikel.',
                    icon: 'error',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    position: 'center',
                    toast: false,
                    background: '#fff',
                    customClass: {
                        popup: 'swal2-center-popup'
                    }
                });
            });
        });
    </script>
</div>
