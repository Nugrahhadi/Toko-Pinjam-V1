@props(['id', 'name', 'value' => '', 'class' => ''])

<div>
    <input 
        id="{{ $id }}" 
        type="hidden" 
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $attributes->merge(['wire:model' => $name]) }}
    >
    
    <trix-editor 
        input="{{ $id }}" 
        class="prose max-w-none {{ $class }}"
        data-upload-url="{{ route('trix.upload') }}"
        style="min-height: 300px;"
        placeholder="Mulai menulis artikel Anda..."
    ></trix-editor>
</div>

<style>
trix-editor {
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    padding: 1rem;
    min-height: 300px;
    font-family: inherit;
}

trix-editor:focus {
    outline: none;
    border-color: #7c3aed;
    box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
}

/* Toolbar styling */
trix-toolbar {
    border: 1px solid #d1d5db;
    border-bottom: none;
    border-radius: 0.5rem 0.5rem 0 0;
    background: #f9fafb;
    padding: 0.5rem;
}

/* Button styling in toolbar */
trix-toolbar .trix-button-group {
    margin-bottom: 0;
}

trix-toolbar .trix-button {
    border-radius: 0.25rem;
    margin-right: 0.25rem;
}

trix-toolbar .trix-button:hover {
    background-color: #e5e7eb;
}

trix-toolbar .trix-button.trix-active {
    background-color: #7c3aed;
    color: white;
}

/* Content styling */
trix-editor .attachment__caption {
    text-align: center;
    font-size: 0.875rem;
    color: #6b7280;
    margin-top: 0.5rem;
}

trix-editor figure {
    margin: 1rem 0;
    text-align: center;
}

trix-editor figure img {
    max-width: 100%;
    height: auto;
    border-radius: 0.25rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editor = document.querySelector('trix-editor[input="{{ $id }}"]');
    
    if (editor) {
        // Handle file attachment
        editor.addEventListener('trix-attachment-add', function(event) {
            const attachment = event.attachment;
            
            if (attachment.file) {
                uploadFileAttachment(attachment);
            }
        });
        
        function uploadFileAttachment(attachment) {
            const uploadUrl = editor.dataset.uploadUrl;
            const formData = new FormData();
            formData.append('attachment', attachment.file);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
            
            // Show upload progress
            attachment.setUploadProgress(0);
            
            fetch(uploadUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.url) {
                    attachment.setAttributes({
                        url: data.url,
                        href: data.href || data.url
                    });
                    attachment.setUploadProgress(100);
                } else {
                    attachment.remove();
                    alert('Upload gagal: ' + (data.error || 'Unknown error'));
                }
            })
            .catch(error => {
                attachment.remove();
                alert('Upload gagal: ' + error.message);
            });
        }
    }
});
</script>
