<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
        <link href="/css/quill-editor/editor.css" rel="stylesheet">
    @endpush
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
        <script src="/js/quill-editor/editor.js"></script>
    @endpush

    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <x-filament::input.wrapper class="overflow-hidden quill-wrapper">
            <div class="h-full flex flex-col -mx-px" wire:ignore>
                <div id="quill-toolbar" class="flex justify-between flex-wrap flex-row-reverse">
                    <div class="flex justify-end grow p-2">
                        <span class="ql-formats !mr-0">
                            <button class="ql-undo"></button>
                            <button class="ql-redo"></button>
                            {{-- <span class="ql-icon-picker ql-picker" x-data="{ expanded: false }">
                                <span id="display-label" tabindex="0" :class="expanded ? 'ql-active' : ''" class="ql-picker-label !flex items-center justify-center" x-on:click="expanded=!expanded" x-on:click.outside="expanded=false"></span>
                                <span x-show="expanded" class="mt-1 bg-gray-100 dark:bg-gray-900 rounded ring-1 ring-gray-950/10 dark:ring-white/20 flex flex-col">
                                    <button id="display-desktop" class="ql-display ql-selected !flex items-center justify-center"></button>
                                    <button id="display-overlay" class="ql-display !flex items-center justify-center" value="overlay"></button>
                                    <button id="display-mobile" class="ql-display !flex items-center justify-center" value="mobile"></button>
                                </span>
                            </span> --}}
                        </span>
                    </div>
                    <div class="flex justify-start grow flex-nowrap overflow-x-auto p-2">
                        <span class="ql-formats">
                            <button class="ql-header" value="2"></button>
                            <button class="ql-header" value="3"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-bold"></button>
                            <button class="ql-italic"></button>
                            <button class="ql-underline"></button>
                            <button class="ql-strike"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-link"></button>
                            <button class="ql-clean"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-align" value=""></button>
                            <button class="ql-align" value="center"></button>
                            <button class="ql-align" value="right"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-blockquote"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-list" value="bullet"></button>
                            <button class="ql-list" value="ordered"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-image"></button>
                            <button class="ql-video"></button>
                        </span>
                        <span class="ql-formats !mr-0">
                            <button class="ql-indent" value="+1"></button>
                            <button class="ql-indent" value="-1"></button>
                        </span>
                    </div>
                </div>
                <div id="quill-editor" class="min-h-[240px] max-h-[440px] max-w-full" style="width: 640px"
                    x-data
                    x-init="
                        quill.root.innerHTML = state;
                        quill.on('text-change', function () {
                            $dispatch('quill-change', quill.root.innerHTML);
                        });
                    "
                    x-on:quill-change.debounce.500ms="state = $event.detail"
                ></div>

                <input x-bind:value="state" hidden>
            </div>
        </x-filament::input.wrapper>
    </div>
</x-dynamic-component>
