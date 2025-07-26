<div>
    @section('title', 'Tulis Artikel')
    
    <!-- Custom Rich Text Editor Styles -->
    <style>
        .custom-editor {
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            overflow: hidden;
            background: white;
        }
        
        .editor-toolbar {
            background: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
            padding: 0.75rem;
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            align-items: center;
        }
        
        .toolbar-group {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.25rem 0.5rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            background: white;
        }
        
        .toolbar-separator {
            width: 1px;
            height: 2rem;
            background: #d1d5db;
            margin: 0 0.5rem;
        }
        
        .toolbar-btn {
            padding: 0.5rem;
            border: none;
            background: transparent;
            border-radius: 0.25rem;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.875rem;
            color: #374151;
            transition: all 0.15s;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 2rem;
            height: 2rem;
        }
        
        .toolbar-btn:hover {
            background: #f3f4f6;
            color: #111827;
        }
        
        .toolbar-btn.active {
            background: #3b82f6;
            color: white;
        }
        
        .toolbar-select {
            padding: 0.5rem 0.75rem;
            border: none;
            border-radius: 0.25rem;
            background: transparent;
            font-size: 0.875rem;
            cursor: pointer;
            color: #374151;
            min-width: 120px;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }
        
        .editor-content {
            min-height: 300px;
            padding: 1rem;
            outline: none;
            line-height: 1.6;
            font-family: 'Google Sans', 'Product Sans', sans-serif;
            overflow-y: auto;
            max-height: 500px;
        }
        
        .editor-content:focus {
            outline: none;
        }
        
        .editor-content:empty:before {
            content: "Mulai menulis artikel Anda di sini...";
            color: #9ca3af;
            pointer-events: none;
        }
        
        /* Styling untuk konten dalam editor */
        .editor-content h1 { font-size: 2rem; font-weight: bold; margin: 1rem 0; }
        .editor-content h2 { font-size: 1.5rem; font-weight: bold; margin: 0.75rem 0; }
        .editor-content h3 { font-size: 1.25rem; font-weight: bold; margin: 0.5rem 0; }
        .editor-content p { margin: 0.5rem 0; }
        .editor-content ul, .editor-content ol { margin: 0.5rem 0; padding-left: 2rem; }
        .editor-content blockquote { border-left: 4px solid #e5e7eb; padding-left: 1rem; margin: 1rem 0; font-style: italic; }
        .editor-content code { background: #f3f4f6; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-family: monospace; }
        .editor-content a { color: #3b82f6; text-decoration: underline; }
        .editor-content img { max-width: 100%; height: auto; }
        .editor-content table { border-collapse: collapse; width: 100%; margin: 1rem 0; }
        .editor-content th, .editor-content td { border: 1px solid #e5e7eb; padding: 0.5rem; text-align: left; }
        .editor-content th { background: #f9fafb; font-weight: bold; }
    </style>
    
    <!-- Success Alert Modal -->
    @if($showSuccessAlert)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" wire:click="closeAlert">
        <div class="bg-[#faf0eb] rounded-3xl p-8 mx-4 max-w-md w-full text-center shadow-2xl" onclick="event.stopPropagation();">
            <div class="mb-6">
                <div class="w-20 h-20 bg-[#433592] rounded-2xl mx-auto flex items-center justify-center mb-4">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-[#433592] mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Artikel sudah terkirim!
                </h3>
            </div>
            <button wire:click="closeAlert" class="bg-[#433592] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#3a2882] transition-all">
                Tutup
            </button>
        </div>
    </div>
    
    <script>
        // Auto-close the alert after 3 seconds
        setTimeout(function() {
            if (@json($showSuccessAlert)) {
                @this.call('closeAlert');
            }
        }, 3000);
    </script>
    @endif

    <!-- Main Content -->
    <section class="py-8 bg-white min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    {{-- <div class="w-20 h-20 bg-[#433592] rounded-2xl flex items-center justify-center">
                        <span class="text-white font-bold text-xl" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">TP</span>
                    </div> --}}
                </div>
                <h1 class="text-3xl font-bold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Tulis Artikel
                </h1>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="submit" class="space-y-6">
                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Kategori:
                    </label>
                    <select wire:model="category" 
                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#433592] focus:outline-none @error('category') border-red-500 bg-red-50 @enderror"
                            style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        <option value="">Silahkan pilih...</option>
                        <option value="Siaran Pers">Siaran Pers</option>
                        <option value="Pengumuman">Pengumuman</option>
                    </select>
                    @error('category')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Judul:
                    </label>
                    <input type="text" wire:model="title" 
                           placeholder="Judul artikel"
                           class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#433592] focus:outline-none @error('title') border-red-500 bg-red-50 @enderror"
                           style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Penulis -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Penulis:
                    </label>
                    <input type="text" wire:model="author" 
                           placeholder="Nama lengkap penulis"
                           class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#433592] focus:outline-none @error('author') border-red-500 bg-red-50 @enderror"
                           style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    @error('author')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- No. Telepon -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        No. telepon:
                    </label>
                    <input type="text" wire:model="author_phone" 
                           placeholder="Nomor telepon penulis"
                           class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#433592] focus:outline-none"
                           style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                </div>

                <!-- Isi Artikel -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Isi:
                    </label>
                    <div class="@error('content') border-2 border-red-500 rounded-lg @endif">
                        <!-- Custom Text Editor -->
                        <div class="custom-editor">
                            <!-- Toolbar -->
                            <div class="editor-toolbar">
                                <!-- Format Group -->
                                <div class="toolbar-group">
                                    <select class="toolbar-select" onchange="changeFormat(this.value)">
                                        <option value="">Paragraph</option>
                                        <option value="h1">Heading 1</option>
                                        <option value="h2">Heading 2</option>
                                        <option value="h3">Heading 3</option>
                                        <option value="h4">Heading 4</option>
                                        <option value="p">Paragraph</option>
                                        <option value="blockquote">Quote</option>
                                    </select>
                                </div>
                                
                                <!-- Insert Group -->
                                <div class="toolbar-group">
                                    <button type="button" class="toolbar-btn" onclick="insertLink()" title="Insert Link">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="toolbar-btn" onclick="insertImage()" title="Insert Image">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="toolbar-btn" onclick="insertTable()" title="Insert Table">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M5,4H19A2,2 0 0,1 21,6V18A2,2 0 0,1 19,20H5A2,2 0 0,1 3,18V6A2,2 0 0,1 5,4M5,8V12H11V8H5M13,8V12H19V8H13M5,14V18H11V14H5M13,14V18H19V14H13Z"/>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="toolbar-separator"></div>
                                
                                <!-- Basic Formatting -->
                                <div class="toolbar-group">
                                    <button type="button" class="toolbar-btn" onclick="formatText('bold')" title="Bold">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M13.5,15.5H10V12.5H13.5A1.5,1.5 0 0,1 15,14A1.5,1.5 0 0,1 13.5,15.5M10,6.5H13A1.5,1.5 0 0,1 14.5,8A1.5,1.5 0 0,1 13,9.5H10M15.6,10.79C16.57,10.11 17.25,9.02 17.25,8C17.25,5.74 15.5,4 13.25,4H7V18H14.04C16.14,18 17.75,16.3 17.75,14.21C17.75,12.69 16.89,11.39 15.6,10.79Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="toolbar-btn" onclick="formatText('italic')" title="Italic">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M10,4V7H12.21L8.79,15H6V18H14V15H11.79L15.21,7H18V4H10Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="toolbar-btn" onclick="formatText('underline')" title="Underline">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M5,21H19V19H5V21M12,17A6,6 0 0,0 18,11V3H15.5V11A3.5,3.5 0 0,1 12,14.5A3.5,3.5 0 0,1 8.5,11V3H6V11A6,6 0 0,0 12,17Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="toolbar-btn" onclick="formatText('strikeThrough')" title="Strikethrough">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M23,12V14H16.61C17.61,14.75 18.15,15.82 18.15,17.23C18.15,19.53 16.24,21.44 13.94,21.44C11.64,21.44 9.73,19.53 9.73,17.23H12.19C12.19,18.18 12.95,18.94 13.9,18.94C14.85,18.94 15.61,18.18 15.61,17.23C15.61,16.5 15.11,15.88 14.38,15.62H1V12H9.4C8.84,11.83 8.34,11.5 7.96,11.04C7.19,10.12 6.84,8.95 6.84,7.69C6.84,5.39 8.75,3.48 11.05,3.48C13.35,3.48 15.26,5.39 15.26,7.69H12.8C12.8,6.74 12.04,5.98 11.09,5.98C10.14,5.98 9.38,6.74 9.38,7.69C9.38,8.11 9.5,8.5 9.75,8.82C10.05,9.19 10.46,9.44 10.92,9.56H23Z"/>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="toolbar-separator"></div>
                                
                                <!-- Alignment -->
                                <div class="toolbar-group">
                                    <button type="button" class="toolbar-btn" onclick="formatText('justifyLeft')" title="Align Left">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3,3H21V5H3V3M3,7H15V9H3V7M3,11H21V13H3V11M3,15H15V17H3V15M3,19H21V21H3V19Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="toolbar-btn" onclick="formatText('justifyCenter')" title="Align Center">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3,3H21V5H3V3M7,7H17V9H7V7M3,11H21V13H3V11M7,15H17V17H7V15M3,19H21V21H3V19Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="toolbar-btn" onclick="formatText('justifyRight')" title="Align Right">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3,3H21V5H3V3M9,7H21V9H9V7M3,11H21V13H3V11M9,15H21V17H9V15M3,19H21V21H3V19Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="toolbar-btn" onclick="formatText('justifyFull')" title="Justify">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3,3H21V5H3V3M3,7H21V9H3V7M3,11H21V13H3V11M3,15H21V17H3V15M3,19H21V21H3V19Z"/>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="toolbar-separator"></div>
                                
                                <!-- Lists -->
                                <div class="toolbar-group">
                                    <button type="button" class="toolbar-btn" onclick="formatText('insertUnorderedList')" title="Bullet List">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M7,5H21V7H7V5M7,13V11H21V13H7M4,4.5A1.5,1.5 0 0,1 5.5,6A1.5,1.5 0 0,1 4,7.5A1.5,1.5 0 0,1 2.5,6A1.5,1.5 0 0,1 4,4.5M4,10.5A1.5,1.5 0 0,1 5.5,12A1.5,1.5 0 0,1 4,13.5A1.5,1.5 0 0,1 2.5,12A1.5,1.5 0 0,1 4,10.5M7,19V17H21V19H7M4,16.5A1.5,1.5 0 0,1 5.5,18A1.5,1.5 0 0,1 4,19.5A1.5,1.5 0 0,1 2.5,18A1.5,1.5 0 0,1 4,16.5Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="toolbar-btn" onclick="formatText('insertOrderedList')" title="Numbered List">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M7,13V11H21V13H7M7,19V17H21V19H7M7,7V5H21V7H7M3,8V5H2V4H4V8H3M2,17V16H5V20H2V19H4V18.5H3V17.5H4V17H2M4.25,10A0.75,0.75 0 0,1 5,10.75C5,10.95 4.92,11.14 4.79,11.27L3.12,13H5V14H2V13.08L4,11H2V10H4.25Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="toolbar-btn" onclick="formatText('outdent')" title="Decrease Indent">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M11,13H21V11H11M11,9H21V7H11M11,17H21V15H11M11,21H21V19H11M3,12L7,16V13H9V11H7V8L3,12Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="toolbar-btn" onclick="formatText('indent')" title="Increase Indent">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M11,13H21V11H11M11,9H21V7H11M11,17H21V15H11M11,21H21V19H11M3,8V16L7,12L3,8Z"/>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="toolbar-separator"></div>
                                
                                <!-- Tools -->
                                <div class="toolbar-group">
                                    <button type="button" class="toolbar-btn" onclick="formatText('removeFormat')" title="Clear Formatting">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M6,5V5.18L8.82,8H11.22L10.5,9.68L12.6,11.78C12.85,11.17 13.06,10.54 13.22,9.9C13.22,9.9 13.22,9.9 13.22,9.9L14.96,5H17L14.21,12.39L18.76,16.94L17.35,18.35L13.39,14.39L11.35,20H9.32L11.54,13.69L2.27,4.42L3.68,3L6,5.31V5H6M9.77,9H9.32L8.81,9.5L12.08,12.77C12.21,12.09 12.1,11.57 12.08,11.37C11.89,10.37 11.18,9.71 10.24,9.32C10.08,9.26 9.93,9.12 9.77,9Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="toolbar-btn" onclick="viewSource()" title="View HTML">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M14.6,16.6L19.2,12L14.6,7.4L16,6L22,12L16,18L14.6,16.6M9.4,16.6L4.8,12L9.4,7.4L8,6L2,12L8,18L9.4,16.6Z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Editor Content Area -->
                            <div 
                                class="editor-content" 
                                contenteditable="true" 
                                id="custom-editor"
                                placeholder="Mulai menulis artikel Anda di sini..."
                                wire:ignore
                                style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            </div>
                        </div>
                        
                        <!-- Hidden textarea untuk Livewire -->
                        <textarea wire:model="content" id="content-textarea" style="display: none;"></textarea>
                    </div>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 pt-6">
                    <button type="submit" 
                            class="bg-[#4b2ba3] text-white font-semibold px-8 py-3 rounded-lg hover:bg-[#3a2882] transition-all flex-1"
                            style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Kirim
                    </button>
                    <button type="button" wire:click="cancel"
                            class="bg-white text-[#4b2ba3] font-semibold px-8 py-3 rounded-lg border-2 border-[#4b2ba3] hover:bg-[#4b2ba3] hover:text-white transition-all flex-1"
                            style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Custom Rich Text Editor Script -->
    <script>
        let editor;
        let isSourceView = false;
        
        document.addEventListener('DOMContentLoaded', function() {
            editor = document.getElementById('custom-editor');
            
            // Sync content dengan Livewire
            editor.addEventListener('input', function() {
                updateLivewireContent();
            });
            
            // Keyboard shortcuts
            editor.addEventListener('keydown', function(e) {
                if (e.ctrlKey || e.metaKey) {
                    switch(e.key) {
                        case 'b':
                            e.preventDefault();
                            formatText('bold');
                            break;
                        case 'i':
                            e.preventDefault();
                            formatText('italic');
                            break;
                        case 'u':
                            e.preventDefault();
                            formatText('underline');
                            break;
                        case 'k':
                            e.preventDefault();
                            insertLink();
                            break;
                    }
                }
            });
            
            editor.addEventListener('paste', function(e) {
                // Bersihkan paste content dari Word/external sources
                e.preventDefault();
                const text = (e.originalEvent || e).clipboardData.getData('text/plain');
                document.execCommand('insertText', false, text);
                updateLivewireContent();
            });
            
            // Set placeholder behavior
            editor.addEventListener('focus', function() {
                if (editor.innerHTML === '' || editor.innerHTML === '<br>') {
                    editor.innerHTML = '';
                }
            });
            
            editor.addEventListener('blur', function() {
                if (editor.innerHTML === '' || editor.innerHTML === '<br>') {
                    editor.innerHTML = '';
                }
                updateLivewireContent();
            });
        });
        
        function updateLivewireContent() {
            const content = editor.innerHTML;
            document.getElementById('content-textarea').value = content;
            @this.set('content', content);
        }
        
        function formatText(command, value = null) {
            editor.focus();
            document.execCommand(command, false, value);
            updateLivewireContent();
            updateToolbarState();
        }
        
        function changeFormat(tag) {
            if (!tag) return;
            editor.focus();
            
            if (tag === 'blockquote') {
                document.execCommand('formatBlock', false, '<' + tag + '>');
            } else {
                document.execCommand('formatBlock', false, '<' + tag + '>');
            }
            updateLivewireContent();
        }
        
        function insertLink() {
            const url = prompt('Masukkan URL:');
            if (url) {
                editor.focus();
                document.execCommand('createLink', false, url);
                updateLivewireContent();
            }
        }
        
        function insertImage() {
            const url = prompt('Masukkan URL gambar:');
            if (url) {
                editor.focus();
                document.execCommand('insertImage', false, url);
                updateLivewireContent();
            }
        }
        
        function insertTable() {
            const rows = prompt('Jumlah baris:', '3');
            const cols = prompt('Jumlah kolom:', '3');
            
            if (rows && cols) {
                let tableHTML = '<table border="1" style="border-collapse: collapse; width: 100%; margin: 10px 0;">';
                
                // Header row
                tableHTML += '<tr>';
                for (let j = 0; j < cols; j++) {
                    tableHTML += '<th style="padding: 8px; background: #f9fafb; border: 1px solid #e5e7eb;">Header ' + (j + 1) + '</th>';
                }
                tableHTML += '</tr>';
                
                // Data rows
                for (let i = 1; i < rows; i++) {
                    tableHTML += '<tr>';
                    for (let j = 0; j < cols; j++) {
                        tableHTML += '<td style="padding: 8px; border: 1px solid #e5e7eb;">Data</td>';
                    }
                    tableHTML += '</tr>';
                }
                tableHTML += '</table>';
                
                editor.focus();
                document.execCommand('insertHTML', false, tableHTML);
                updateLivewireContent();
            }
        }
        
        function viewSource() {
            if (!isSourceView) {
                // Switch to HTML source view
                const content = editor.innerHTML;
                editor.innerHTML = '<pre style="white-space: pre-wrap; font-family: monospace; background: #f3f4f6; padding: 1rem; border-radius: 0.25rem;">' + escapeHtml(content) + '</pre>';
                editor.contentEditable = false;
                isSourceView = true;
            } else {
                // Switch back to visual view
                const pre = editor.querySelector('pre');
                if (pre) {
                    editor.innerHTML = unescapeHtml(pre.textContent);
                }
                editor.contentEditable = true;
                isSourceView = false;
                updateLivewireContent();
            }
        }
        
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
        
        function unescapeHtml(text) {
            const div = document.createElement('div');
            div.innerHTML = text;
            return div.textContent;
        }
        
        function updateToolbarState() {
            // Update toolbar button states based on current selection
            const buttons = document.querySelectorAll('.toolbar-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            
            if (document.queryCommandState('bold')) {
                document.querySelector('[onclick="formatText(\'bold\')"]').classList.add('active');
            }
            if (document.queryCommandState('italic')) {
                document.querySelector('[onclick="formatText(\'italic\')"]').classList.add('active');
            }
            if (document.queryCommandState('underline')) {
                document.querySelector('[onclick="formatText(\'underline\')"]').classList.add('active');
            }
        }
        
        // Update toolbar state jika ada perubahan di selection
        document.addEventListener('selectionchange', updateToolbarState);
        
        // Livewire events
        Livewire.on('refresh-editor', function() {
            if (editor) {
                editor.innerHTML = '';
                updateLivewireContent();
            }
        });
        
        // Inisialisasi konten editor dengan data dari livewire jika ada
        function initEditorContent() {
            const initialContent = @this.get('content');
            if (initialContent && editor) {
                editor.innerHTML = initialContent;
            }
        }
        
        // Call init after Livewire is ready
        document.addEventListener('livewire:load', initEditorContent);
    </script>
</div>
