<div class="min-h-screen bg-white"
     x-data="{ 
         editorContent: '',
         isSourceView: false,
         activeButtons: {
             bold: false,
             italic: false,
             underline: false
         }
     }"
     x-init="
         $watch('editorContent', value => {
             $wire.set('content', value);
         });
     ">

    <!-- Main Content -->
    <section class="py-8 min-h-screen">
        <!-- Success Alert Modal -->
        @if($showSuccessAlert)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50" 
             x-data="{ show: true }"
             x-show="show"
             x-transition
             @click.self="$wire.closeAlert()"
             x-init="setTimeout(() => show = false, 3000)">
            <div class="bg-orange-50 rounded-3xl p-8 mx-4 max-w-md w-full text-center shadow-2xl transform transition-all">
                <div class="mb-6">
                    <div class="w-20 h-20 bg-purple-700 rounded-2xl mx-auto flex items-center justify-center mb-4">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-purple-700 mb-2 font-sans">
                        Artikel sudah terkirim!
                    </h3>
                </div>
                <button wire:click="closeAlert" 
                        class="bg-purple-700 text-white px-6 py-2 rounded-lg font-semibold hover:bg-purple-800 transition-all">
                    Tutup
                </button>
            </div>
        </div>
        @endif

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-purple-700 font-sans">
                    Tulis Artikel
                </h1>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="submit" class="space-y-6">
                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 font-sans">
                        Kategori:
                    </label>
                    <select wire:model="category" 
                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-purple-600 focus:outline-none transition-colors font-sans @error('category') border-red-500 bg-red-50 @enderror">
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
                    <label class="block text-sm font-medium text-gray-700 mb-2 font-sans">
                        Judul:
                    </label>
                    <input type="text" wire:model="title" 
                           placeholder="Judul artikel"
                           class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-purple-600 focus:outline-none transition-colors font-sans @error('title') border-red-500 bg-red-50 @enderror">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Featured Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 font-sans">
                        Gambar Unggulan (Featured Image):
                    </label>
                    <div class="relative">
                        <input type="file" 
                               wire:model="featured_image" 
                               accept="image/*"
                               class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-purple-600 focus:outline-none transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-purple-700 file:text-white hover:file:bg-purple-800 file:transition-colors font-sans @error('featured_image') border-red-500 bg-red-50 @enderror">
                        
                        @if($featured_image)
                            <div class="mt-3 p-3 bg-green-50 border border-green-200 rounded-lg">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-sm text-green-700">{{ $featured_image->getClientOriginalName() }}</span>
                                    <button type="button" wire:click="removeFeaturedImage" class="ml-auto text-red-600 hover:text-red-800 transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                    @error('featured_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1">Format yang didukung: JPG, PNG, WEBP. Maksimal 5MB. Gambar akan dikompres otomatis.</p>
                </div>

                <!-- Penulis -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 font-sans">
                        Penulis:
                    </label>
                    <input type="text" wire:model="author" 
                           placeholder="Nama lengkap penulis"
                           class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-purple-600 focus:outline-none transition-colors font-sans @error('author') border-red-500 bg-red-50 @enderror">
                    @error('author')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- No. Telepon -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 font-sans">
                        No. telepon:
                    </label>
                    <input type="text" wire:model="author_phone" 
                           placeholder="Nomor telepon penulis"
                           class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-purple-600 focus:outline-none transition-colors font-sans">
                </div>

                <!-- Email Penulis -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 font-sans">
                        Email penulis:
                    </label>
                    <input type="email" wire:model="author_email" 
                           placeholder="Email penulis"
                           class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-purple-600 focus:outline-none transition-colors font-sans @error('author_email') border-red-500 bg-red-50 @enderror">
                    @error('author_email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Isi Artikel -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 font-sans">
                        Isi:
                    </label>
                    <div class="@error('content') border-2 border-red-500 rounded-lg @endif">
                        <!-- Custom Text Editor -->
                        <div class="border border-gray-300 rounded-lg overflow-hidden bg-white">
                            <!-- Toolbar -->
                            <div class="bg-gray-50 border-b border-gray-200 p-3 flex flex-wrap gap-2 items-center">
                                <!-- Format Group -->
                                <div class="flex items-center gap-1 px-2 py-1 border border-gray-200 rounded-md bg-white">
                                    <select class="px-3 py-2 border-0 rounded text-sm cursor-pointer text-gray-700 bg-transparent focus:outline-none min-w-[120px] appearance-none bg-no-repeat bg-right pr-8" 
                                            style="background-image: url(&quot;data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e&quot;); background-position: right 0.5rem center; background-size: 1.5em 1.5em;"
                                            onchange="changeFormat(this.value)">
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
                                <div class="flex items-center gap-1 px-2 py-1 border border-gray-200 rounded-md bg-white">
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8"
                                            onclick="insertLink()" 
                                            title="Insert Link">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8"
                                            onclick="insertImage()" 
                                            title="Insert Image">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z"/>
                                        </svg>
                                    </button>
                                    <!-- Hidden file input for content images -->
                                    <input type="file" id="content-image-input" accept="image/*" class="hidden" onchange="handleContentImageUpload(this)">
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8"
                                            onclick="insertTable()" 
                                            title="Insert Table">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M5,4H19A2,2 0 0,1 21,6V18A2,2 0 0,1 19,20H5A2,2 0 0,1 3,18V6A2,2 0 0,1 5,4M5,8V12H11V8H5M13,8V12H19V8H13M5,14V18H11V14H5M13,14V18H19V14H13Z"/>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="w-px h-8 bg-gray-300 mx-2"></div>
                                
                                <!-- Basic Formatting -->
                                <div class="flex items-center gap-1 px-2 py-1 border border-gray-200 rounded-md bg-white">
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="formatText('bold')" 
                                            title="Bold">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M13.5,15.5H10V12.5H13.5A1.5,1.5 0 0,1 15,14A1.5,1.5 0 0,1 13.5,15.5M10,6.5H13A1.5,1.5 0 0,1 14.5,8A1.5,1.5 0 0,1 13,9.5H10M15.6,10.79C16.57,10.11 17.25,9.02 17.25,8C17.25,5.74 15.5,4 13.25,4H7V18H14.04C16.14,18 17.75,16.3 17.75,14.21C17.75,12.69 16.89,11.39 15.6,10.79Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="formatText('italic')" 
                                            title="Italic">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M10,4V7H12.21L8.79,15H6V18H14V15H11.79L15.21,7H18V4H10Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="formatText('underline')" 
                                            title="Underline">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M5,21H19V19H5V21M12,17A6,6 0 0,0 18,11V3H15.5V11A3.5,3.5 0 0,1 12,14.5A3.5,3.5 0 0,1 8.5,11V3H6V11A6,6 0 0,0 12,17Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="formatText('strikeThrough')" 
                                            title="Strikethrough">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M23,12V14H16.61C17.61,14.75 18.15,15.82 18.15,17.23C18.15,19.53 16.24,21.44 13.94,21.44C11.64,21.44 9.73,19.53 9.73,17.23H12.19C12.19,18.18 12.95,18.94 13.9,18.94C14.85,18.94 15.61,18.18 15.61,17.23C15.61,16.5 15.11,15.88 14.38,15.62H1V12H9.4C8.84,11.83 8.34,11.5 7.96,11.04C7.19,10.12 6.84,8.95 6.84,7.69C6.84,5.39 8.75,3.48 11.05,3.48C13.35,3.48 15.26,5.39 15.26,7.69H12.8C12.8,6.74 12.04,5.98 11.09,5.98C10.14,5.98 9.38,6.74 9.38,7.69C9.38,8.11 9.5,8.5 9.75,8.82C10.05,9.19 10.46,9.44 10.92,9.56H23Z"/>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="w-px h-8 bg-gray-300 mx-2"></div>
                                
                                <!-- Alignment -->
                                <div class="flex items-center gap-1 px-2 py-1 border border-gray-200 rounded-md bg-white">
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="formatText('justifyLeft')" 
                                            title="Align Left">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3,3H21V5H3V3M3,7H15V9H3V7M3,11H21V13H3V11M3,15H15V17H3V15M3,19H21V21H3V19Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="formatText('justifyCenter')" 
                                            title="Align Center">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3,3H21V5H3V3M7,7H17V9H7V7M3,11H21V13H3V11M7,15H17V17H7V15M3,19H21V21H3V19Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="formatText('justifyRight')" 
                                            title="Align Right">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3,3H21V5H3V3M9,7H21V9H9V7M3,11H21V13H3V11M9,15H21V17H9V15M3,19H21V21H3V19Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="formatText('justifyFull')" 
                                            title="Justify">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3,3H21V5H3V3M3,7H21V9H3V7M3,11H21V13H3V11M3,15H21V17H3V15M3,19H21V21H3V19Z"/>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="w-px h-8 bg-gray-300 mx-2"></div>
                                
                                <!-- Lists -->
                                <div class="flex items-center gap-1 px-2 py-1 border border-gray-200 rounded-md bg-white">
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="formatText('insertUnorderedList')" 
                                            title="Bullet List">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M7,5H21V7H7V5M7,13V11H21V13H7M4,4.5A1.5,1.5 0 0,1 5.5,6A1.5,1.5 0 0,1 4,7.5A1.5,1.5 0 0,1 2.5,6A1.5,1.5 0 0,1 4,4.5M4,10.5A1.5,1.5 0 0,1 5.5,12A1.5,1.5 0 0,1 4,13.5A1.5,1.5 0 0,1 2.5,12A1.5,1.5 0 0,1 4,10.5M7,19V17H21V19H7M4,16.5A1.5,1.5 0 0,1 5.5,18A1.5,1.5 0 0,1 4,19.5A1.5,1.5 0 0,1 2.5,18A1.5,1.5 0 0,1 4,16.5Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="formatText('insertOrderedList')" 
                                            title="Numbered List">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M7,13V11H21V13H7M7,19V17H21V19H7M7,7V5H21V7H7M3,8V5H2V4H4V8H3M2,17V16H5V20H2V19H4V18.5H3V17.5H4V17H2M4.25,10A0.75,0.75 0 0,1 5,10.75C5,10.95 4.92,11.14 4.79,11.27L3.12,13H5V14H2V13.08L4,11H2V10H4.25Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="formatText('outdent')" 
                                            title="Decrease Indent">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M11,13H21V11H11M11,9H21V7H11M11,17H21V15H11M11,21H21V19H11M3,12L7,16V13H9V11H7V8L3,12Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="formatText('indent')" 
                                            title="Increase Indent">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M11,13H21V11H11M11,9H21V7H11M11,17H21V15H11M11,21H21V19H11M3,8V16L7,12L3,8Z"/>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="w-px h-8 bg-gray-300 mx-2"></div>
                                
                                <!-- Tools -->
                                <div class="flex items-center gap-1 px-2 py-1 border border-gray-200 rounded-md bg-white">
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="formatText('removeFormat')" 
                                            title="Clear Formatting">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M6,5V5.18L8.82,8H11.22L10.5,9.68L12.6,11.78C12.85,11.17 13.06,10.54 13.22,9.9C13.22,9.9 13.22,9.9 13.22,9.9L14.96,5H17L14.21,12.39L18.76,16.94L17.35,18.35L13.39,14.39L11.35,20H9.32L11.54,13.69L2.27,4.42L3.68,3L6,5.31V5H6M9.77,9H9.32L8.81,9.5L12.08,12.77C12.21,12.09 12.1,11.57 12.08,11.37C11.89,10.37 11.18,9.71 10.24,9.32C10.08,9.26 9.93,9.12 9.77,9Z"/>
                                        </svg>
                                    </button>
                                    <button type="button" 
                                            class="p-2 border-0 bg-transparent rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-all flex items-center justify-center min-w-8 h-8" 
                                            onclick="viewSource()" 
                                            title="View HTML">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M14.6,16.6L19.2,12L14.6,7.4L16,6L22,12L16,18L14.6,16.6M9.4,16.6L4.8,12L9.4,7.4L8,6L2,12L8,18L9.4,16.6Z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Editor Content Area dengan Tailwind CSS -->
                            <div 
                                class="min-h-[300px] max-h-[500px] p-4 outline-none leading-relaxed font-sans overflow-y-auto focus:outline-none prose prose-sm max-w-none
                                       [&>h1]:text-4xl [&>h1]:font-bold [&>h1]:my-4
                                       [&>h2]:text-2xl [&>h2]:font-bold [&>h2]:my-3
                                       [&>h3]:text-xl [&>h3]:font-bold [&>h3]:my-2
                                       [&>p]:my-2
                                       [&>ul]:my-2 [&>ul]:pl-8 [&>ol]:my-2 [&>ol]:pl-8
                                       [&>blockquote]:border-l-4 [&>blockquote]:border-gray-200 [&>blockquote]:pl-4 [&>blockquote]:my-4 [&>blockquote]:italic
                                       [&>code]:bg-gray-100 [&>code]:px-2 [&>code]:py-1 [&>code]:rounded [&>code]:font-mono
                                       [&>a]:text-blue-600 [&>a]:underline
                                       [&>img]:max-w-full [&>img]:h-auto
                                       [&>table]:border-collapse [&>table]:w-full [&>table]:my-4
                                       [&>table_th]:border [&>table_th]:border-gray-200 [&>table_th]:p-2 [&>table_th]:text-left [&>table_th]:bg-gray-50 [&>table_th]:font-bold
                                       [&>table_td]:border [&>table_td]:border-gray-200 [&>table_td]:p-2 [&>table_td]:text-left
                                       empty:before:content-['Mulai_menulis_artikel_Anda_di_sini...'] empty:before:text-gray-400 empty:before:pointer-events-none"
                                contenteditable="true" 
                                id="custom-editor"
                                wire:ignore>
                            </div>
                        </div>
                        
                        <!-- Hidden textarea untuk Livewire -->
                        <textarea wire:model="content" id="content-textarea" class="hidden"></textarea>
                    </div>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 pt-6">
                    <button type="submit" 
                            class="bg-purple-700 text-white font-semibold px-8 py-3 rounded-lg hover:bg-purple-800 transition-all flex-1 font-sans">
                        Kirim
                    </button>
                    <button type="button" wire:click="cancel"
                            class="bg-white text-purple-700 font-semibold px-8 py-3 rounded-lg border-2 border-purple-700 hover:bg-purple-700 hover:text-white transition-all flex-1 font-sans">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </section>

    
</div>

<!-- Rich Text Editor Script dengan Alpine.js Integration -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('richEditor', () => ({
                editor: null,
                isSourceView: false,
                
                init() {
                    this.editor = document.getElementById('custom-editor');
                    this.setupEventListeners();
                },
                
                setupEventListeners() {
                    // Sync content dengan Livewire
                    this.editor.addEventListener('input', () => {
                        this.updateLivewireContent();
                    });
                    
                    // Keyboard shortcuts
                    this.editor.addEventListener('keydown', (e) => {
                        if (e.ctrlKey || e.metaKey) {
                            switch(e.key) {
                                case 'b':
                                    e.preventDefault();
                                    this.formatText('bold');
                                    break;
                                case 'i':
                                    e.preventDefault();
                                    this.formatText('italic');
                                    break;
                                case 'u':
                                    e.preventDefault();
                                    this.formatText('underline');
                                    break;
                                case 'k':
                                    e.preventDefault();
                                    insertLink();
                                    break;
                            }
                        }
                    });
                    
                    // Clean paste content
                    this.editor.addEventListener('paste', (e) => {
                        e.preventDefault();
                        const text = (e.originalEvent || e).clipboardData.getData('text/plain');
                        document.execCommand('insertText', false, text);
                        this.updateLivewireContent();
                    });
                    
                    // Focus/blur handlers
                    this.editor.addEventListener('focus', () => {
                        if (this.editor.innerHTML === '' || this.editor.innerHTML === '<br>') {
                            this.editor.innerHTML = '';
                        }
                    });
                    
                    this.editor.addEventListener('blur', () => {
                        if (this.editor.innerHTML === '' || this.editor.innerHTML === '<br>') {
                            this.editor.innerHTML = '';
                        }
                        this.updateLivewireContent();
                    });
                },
                
                updateLivewireContent() {
                    const content = this.editor.innerHTML;
                    document.getElementById('content-textarea').value = content;
                    $wire.set('content', content);
                },
                
                formatText(command, value = null) {
                    this.editor.focus();
                    document.execCommand(command, false, value);
                    this.updateLivewireContent();
                    this.updateToolbarState();
                },
                
                updateToolbarState() {
                    // Update button states berdasarkan selection
                    const buttons = document.querySelectorAll('[onclick*="formatText"]');
                    buttons.forEach(btn => {
                        btn.classList.remove('bg-blue-600', 'text-white');
                        btn.classList.add('text-gray-700');
                    });
                    
                    if (document.queryCommandState('bold')) {
                        const boldBtn = document.querySelector('[onclick*="bold"]');
                        if (boldBtn) {
                            boldBtn.classList.add('bg-blue-600', 'text-white');
                            boldBtn.classList.remove('text-gray-700');
                        }
                    }
                    if (document.queryCommandState('italic')) {
                        const italicBtn = document.querySelector('[onclick*="italic"]');
                        if (italicBtn) {
                            italicBtn.classList.add('bg-blue-600', 'text-white');
                            italicBtn.classList.remove('text-gray-700');
                        }
                    }
                    if (document.queryCommandState('underline')) {
                        const underlineBtn = document.querySelector('[onclick*="underline"]');
                        if (underlineBtn) {
                            underlineBtn.classList.add('bg-blue-600', 'text-white');
                            underlineBtn.classList.remove('text-gray-700');
                        }
                    }
                }
            }));
        });
        
        // Global functions untuk toolbar
        function formatText(command, value = null) {
            const editor = document.getElementById('custom-editor');
            editor.focus();
            document.execCommand(command, false, value);
            updateLivewireContent();
            updateToolbarState();
        }
        
        function changeFormat(tag) {
            if (!tag) return;
            const editor = document.getElementById('custom-editor');
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
                const editor = document.getElementById('custom-editor');
                editor.focus();
                document.execCommand('createLink', false, url);
                updateLivewireContent();
            }
        }
        
        function insertImage() {
            const fileInput = document.getElementById('content-image-input');
            fileInput.click();
        }
        
        function handleContentImageUpload(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                
                // Validasi tipe file
                if (!file.type.startsWith('image/')) {
                    alert('Please select a valid image file.');
                    return;
                }
                
                // Validasi ukuran file (5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('File size must be less than 5MB.');
                    return;
                }
                
                // Create FormData for upload
                const formData = new FormData();
                formData.append('image', file);
                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                
                // Show loading indicator
                const loadingHtml = '<div class="inline-block p-2 bg-gray-100 rounded" id="image-loading">📤 Uploading image...</div>';
                const editor = document.getElementById('custom-editor');
                editor.focus();
                document.execCommand('insertHTML', false, loadingHtml);
                updateLivewireContent();
                
                // Upload image via fetch
                fetch('/upload-content-image', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Remove loading indicator
                    const loadingElement = document.getElementById('image-loading');
                    if (loadingElement) {
                        loadingElement.remove();
                    }
                    
                    if (data.success) {
                        // Insert the uploaded image
                        const imageHtml = `<img src="${data.url}" alt="Content Image" class="max-w-full h-auto my-2.5">`;
                        editor.focus();
                        document.execCommand('insertHTML', false, imageHtml);
                        updateLivewireContent();
                    } else {
                        alert('Failed to upload image: ' + (data.message || 'Unknown error'));
                    }
                })
                .catch(error => {
                    // Remove loading indicator
                    const loadingElement = document.getElementById('image-loading');
                    if (loadingElement) {
                        loadingElement.remove();
                    }
                    console.error('Error:', error);
                    alert('Failed to upload image. Please try again.');
                });
                
                // Reset file input
                input.value = '';
            }
        }
        
        function insertTable() {
            const rows = prompt('Jumlah baris:', '3');
            const cols = prompt('Jumlah kolom:', '3');
            
            if (rows && cols) {
                let tableHTML = '<table class="border-collapse w-full my-4 border border-gray-200">';
                
                // Header row
                tableHTML += '<tr>';
                for (let j = 0; j < cols; j++) {
                    tableHTML += '<th class="p-2 bg-gray-50 border border-gray-200 text-left font-bold">Header ' + (j + 1) + '</th>';
                }
                tableHTML += '</tr>';
                
                // Data rows
                for (let i = 1; i < rows; i++) {
                    tableHTML += '<tr>';
                    for (let j = 0; j < cols; j++) {
                        tableHTML += '<td class="p-2 border border-gray-200 text-left">Data</td>';
                    }
                    tableHTML += '</tr>';
                }
                tableHTML += '</table>';
                
                const editor = document.getElementById('custom-editor');
                editor.focus();
                document.execCommand('insertHTML', false, tableHTML);
                updateLivewireContent();
            }
        }
        
        function viewSource() {
            const editor = document.getElementById('custom-editor');
            let isSourceView = editor.getAttribute('data-source-view') === 'true';
            
            if (!isSourceView) {
                // Switch to HTML source view
                const content = editor.innerHTML;
                editor.innerHTML = '<pre class="whitespace-pre-wrap font-mono bg-gray-100 p-4 rounded">' + escapeHtml(content) + '</pre>';
                editor.contentEditable = false;
                editor.setAttribute('data-source-view', 'true');
            } else {
                // Switch back to visual view
                const pre = editor.querySelector('pre');
                if (pre) {
                    editor.innerHTML = unescapeHtml(pre.textContent);
                }
                editor.contentEditable = true;
                editor.setAttribute('data-source-view', 'false');
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
        
        function updateLivewireContent() {
            const editor = document.getElementById('custom-editor');
            const content = editor.innerHTML;
            document.getElementById('content-textarea').value = content;
            $wire.set('content', content);
        }
        
        function updateToolbarState() {
            // Update toolbar button states based on current selection
            const buttons = document.querySelectorAll('[onclick*="formatText"]');
            buttons.forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('text-gray-700');
            });
            
            if (document.queryCommandState('bold')) {
                const boldBtn = document.querySelector('[onclick*="bold"]');
                if (boldBtn) {
                    boldBtn.classList.add('bg-blue-600', 'text-white');
                    boldBtn.classList.remove('text-gray-700');
                }
            }
            if (document.queryCommandState('italic')) {
                const italicBtn = document.querySelector('[onclick*="italic"]');
                if (italicBtn) {
                    italicBtn.classList.add('bg-blue-600', 'text-white');
                    italicBtn.classList.remove('text-gray-700');
                }
            }
            if (document.queryCommandState('underline')) {
                const underlineBtn = document.querySelector('[onclick*="underline"]');
                if (underlineBtn) {
                    underlineBtn.classList.add('bg-blue-600', 'text-white');
                    underlineBtn.classList.remove('text-gray-700');
                }
            }
        }
        
        // Update toolbar state jika ada perubahan di selection
        document.addEventListener('selectionchange', updateToolbarState);
        
        // Livewire events
        document.addEventListener('livewire:load', function() {
            const editor = document.getElementById('custom-editor');
            if (editor) {
                const initialContent = @json($content ?? '');
                if (initialContent) {
                    editor.innerHTML = initialContent;
                }
            }
        });
        
        // Livewire refresh event
        Livewire.on('refresh-editor', function() {
            const editor = document.getElementById('custom-editor');
            if (editor) {
                editor.innerHTML = '';
                updateLivewireContent();
            }
        });
    </script>