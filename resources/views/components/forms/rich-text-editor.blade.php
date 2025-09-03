@props([
    'name' => 'content',
    'label' => 'Content',
    'value' => '',
    'placeholder' => 'Write here...',
    'height' => 400,
])

@php($editorId = $name . '_' . uniqid())

<div class="space-y-2">
    <label for="{{ $editorId }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <textarea id="{{ $editorId }}" name="{{ $name }}" rows="10" class="w-full rounded-xl border border-gray-300 p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
        placeholder="{{ $placeholder }}">{!! old($name, $value) !!}</textarea>
</div>

@push('scripts')
    @once
        <script>
            (function loadTinyMCE(){
                if (window.tinymce) return;
                var s = document.createElement('script');
                s.src = 'https://cdn.jsdelivr.net/npm/tinymce@6.8.3/tinymce.min.js';
                s.referrerPolicy = 'origin';
                s.onload = function(){ window.__tinyReady = true; };
                document.head.appendChild(s);
            })();
        </script>
    @endonce

    <script>
        (function initEditor(){
            const id = @json($editorId);
            const height = @json((int)$height);

            function mount(){
                if (!window.tinymce) { return setTimeout(mount, 100); }
                if (window.tinymce.get(id)) { return; }
                tinymce.init({
                    selector: '#' + id,
                    height: height,
                    menubar: false,
                    plugins: 'link lists table code image autoresize',
                    toolbar: 'undo redo | styles | bold italic underline | bullist numlist | link table | code',
                    content_style: 'body{font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif; font-size:14px}',
                });
            }
            mount();
        })();
    </script>
@endpush