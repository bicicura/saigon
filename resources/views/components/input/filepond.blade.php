<div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
    <label for="{{$id}}" class="block text-sm font-semibold leading-5 text-gray-700">
        {{$label}}
    </label>

    <div class="mt-2 sm:mt-0 sm:col-span-2">
        <div class="flex items-center">
            <div x-data x-init="
            FilePond.registerPlugin(
                {{-- FilePondPluginImageExifOrientation, --}}
                FilePondPluginFileValidateSize,
                );
            pond = FilePond.create($refs.input);
            pond.setOptions({
                allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
                maxFileSize: '50MB',
                labelMaxFileSize: `El tamaño máximo de archivo es 50MB`,
                labelMaxFileSizeExceeded: 'El archivo es muy pesado',
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => { @this.upload('{{ $attributes['wire:model'] }}', file, load, error, (event) => { progress(event.lengthComputable, event.loaded, event.total) }) },
                    revert: (filename, load) => {
                        @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                    },
                    },
                });
                " 
            class="w-full"
            wire:ignore>
                <input data-allow-reorder="true" x-ref="input" type="file" class="w-full">
            </div>
        </div>
    </div>
</div>