<x-filament::page>
    {{-- Search --}}
    <div class="mb-4">
        <x-filament::input
            wire:model.debounce.500ms="search"
            placeholder="Search documents..."
            icon="heroicon-o-magnifying-glass"
        />
    </div>

    {{-- Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
        @forelse ($this->documents as $document)
            <div class="rounded-xl border border-gray-700 bg-gray-900 p-4 hover:bg-gray-800 transition">
                
                {{-- File Icon --}}
                <div class="flex justify-center mb-3">
                    @php
                        $ext = strtolower($document->file_type);
                    @endphp

                    @if (in_array($ext, ['pdf']))
                        <x-heroicon-o-document-text class="w-12 h-12 text-red-500" />
                    @elseif (in_array($ext, ['zip','rar']))
                        <x-heroicon-o-archive-box class="w-12 h-12 text-yellow-500" />
                    @elseif (in_array($ext, ['jpg','png','jpeg','gif']))
                        <x-heroicon-o-photo class="w-12 h-12 text-blue-400" />
                    @elseif (in_array($ext, ['php','js','ts','json']))
                        <x-heroicon-o-code-bracket class="w-12 h-12 text-green-400" />
                    @else
                        <x-heroicon-o-document class="w-12 h-12 text-gray-400" />
                    @endif
                </div>

                {{-- Title --}}
                <div class="text-sm font-semibold truncate text-center">
                    {{ $document->title }}
                </div>

                {{-- Meta --}}
                <div class="text-xs text-gray-400 text-center mt-1">
                    {{ strtoupper($document->file_type) }} •
                    {{ number_format($document->file_size / 1024 / 1024, 2) }} MB
                </div>

                {{-- Actions --}}
                <div class="flex justify-center gap-3 mt-3">
                    <a
                        href="{{ asset('storage/'.$document->file_path) }}"
                        target="_blank"
                        class="text-primary-400 hover:text-primary-300 text-xs"
                    >
                        View
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500">
                No documents found.
            </div>
        @endforelse
    </div>
</x-filament::page>
