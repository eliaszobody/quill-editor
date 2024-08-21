<?php
    $quillId = Str::uuid();
    $isProse = $isProse();
    $isDisabled = $isDisabled();
    $toolbarLeft = $getToolbarLeft();
    $toolbarRight = $getToolbarRight();
    $customActions = $getCustomActions();
    $otherModules = $getOtherModules();
    $registerModules = $getRegisterModules();
    $customIconButtons = $getCustomIconButtons();
    $customIconDropdowns = $getCustomIconDropdowns();
    $customTextButtons = $getCustomTextButtons();
    $customTextDropdowns = $getCustomTextDropdowns();
    $defaultButtons = [
        'undo' => ['undo'],
        'redo' => ['redo'],
        'bold' => ['bold'],
        'link' => ['link'],
        'code' => ['code'],
        'image' => ['image'],
        'video' => ['video'],
        'italic' => ['italic'],
        'unstyle' => ['clean'],
        'formula' => ['formula'],
        'underline' => ['underline'],
        'strikethrough' => ['strike'],
        'codeblock' => ['code-block'],
        'blockquote' => ['blockquote'],
        'header1' => ['header', 'value' => 1],
        'header2' => ['header', 'value' => 2],
        'header3' => ['header', 'value' => 3],
        'header4' => ['header', 'value' => 4],
        'header5' => ['header', 'value' => 5],
        'header6' => ['header', 'value' => 6],
        'leftalign' => ['align', 'value' => ''],
        'centeralign' => ['align', 'value' => 'center'],
        'rightalign' => ['align', 'value' => 'right'],
        'justifyalign' => ['align', 'value' => 'justify'],
        'subscript' => ['script', 'value' => 'sub'],
        'superscript' => ['script', 'value' => 'super'],
        'indent' => ['indent', 'value' => '+1'],
        'outdent' => ['indent', 'value' => '-1'],
        'bulletlist' => ['list', 'value' => 'bullet'],
        'orderedlist' => ['list', 'value' => 'ordered'],
        'checklist' => ['list', 'value' => 'check'],
        'righttoleft' => ['direction', 'value' => 'rtl'],
    ];
    $defaultDropdowns = [
        'bg-color' => ['background'],
        'text-color' => ['color'],
        'font-family' => ['font'],
        'text-snlh' => ['size', 'options' => ['small','','large','huge']],
        'text-snl' => ['size', 'options' => ['small','','large']],
        'text-nlh' => ['size', 'options' => ['small','','large']],
        'align-lcrj' => ['align', 'options' => ['','center','right','justify']],
        'align-lcr' => ['align', 'options' => ['','center','right']],
        'align-lrj' => ['align', 'options' => ['','right','justify']],
        'align-lr' => ['align', 'options' => ['','right']],
        'header-1-6' => ['header', 'options' => ['',1,2,3,4,5,6]],
        'header-2-6' => ['header', 'options' => ['',2,3,4,5,6]],
        'header-3-6' => ['header', 'options' => ['',3,4,5,6]],
        'header-4-6' => ['header', 'options' => ['',4,5,6]],
        'header-5-6' => ['header', 'options' => ['',5,6]],
        'header-1-5' => ['header', 'options' => ['',1,2,3,4,5]],
        'header-2-5' => ['header', 'options' => ['',2,3,4,5]],
        'header-3-5' => ['header', 'options' => ['',3,4,5]],
        'header-4-5' => ['header', 'options' => ['',4,5]],
        'header-1-4' => ['header', 'options' => ['',1,2,3,4]],
        'header-2-4' => ['header', 'options' => ['',2,3,4]],
        'header-3-4' => ['header', 'options' => ['',3,4]],
        'header-1-3' => ['header', 'options' => ['',1,2,3]],
        'header-2-3' => ['header', 'options' => ['',2,3]],
        'header-1-2' => ['header', 'options' => ['',1,2]],
    ];
?>

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <x-filament::input.wrapper x-cloak :disabled="$isDisabled">
            <div class="ql-wrapper" wire:ignore>
                @if (!$isDisabled)
                    <div id="quill-toolbar-{{ $quillId }}">
                        @if (!empty($toolbarRight))
                            <div class="ql-toolbar-right">
                                @foreach ($toolbarRight as $group)
                                    <span class="ql-formats">
                                        @foreach ($group as $entry)
                                            @if (array_key_exists($entry, $customIconDropdowns))
                                                <span x-data="{ expanded: false }" class="ql-picker ql-icon-picker ql-picker-custom" :class="expanded ? 'ql-expanded' : ''">
                                                    @if (array_key_exists($customIconDropdowns[$entry]['label'], $customIconButtons))
                                                        <button class="ql-{{ $customIconDropdowns[$entry]['label'] }} ql-picker-label"
                                                            x-on:click="expanded=!expanded" x-on:click.outside="expanded=false">
                                                            {{ $customIconButtons[$customIconDropdowns[$entry]['label']] }}</button>
                                                    @elseif (array_key_exists($customIconDropdowns[$entry]['label'], $defaultButtons))
                                                        <button class="ql-{{ $defaultButtons[$customIconDropdowns[$entry]['label']][0] }} ql-picker-label"
                                                            x-on:click="expanded=!expanded" x-on:click.outside="expanded=false"
                                                            {{ array_key_exists('value', $defaultButtons[$customIconDropdowns[$entry]['label']]) ? 'value='.$defaultButtons[$customIconDropdowns[$entry]['label']]['value'] : '' }}></button>
                                                    @endif
                                                    <span class="ql-picker-options">
                                                        @foreach ($customIconDropdowns[$entry]['options'] as $value)
                                                            @if (array_key_exists($value, $customIconButtons))
                                                                <button class="ql-{{ $value }} ql-picker-item">{!! $customIconButtons[$value] !!}</button>
                                                            @elseif (array_key_exists($value, $defaultButtons))
                                                                <button class="ql-{{ $defaultButtons[$value][0] }} ql-picker-item"
                                                                    {{ array_key_exists('value', $defaultButtons[$value]) ? 'value='.$defaultButtons[$value]['value'] : '' }}></button>
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </span>
                                            @elseif (array_key_exists($entry, $customTextDropdowns))
                                                <span x-data="{ expanded: false }" class="ql-picker ql-picker-custom" :class="expanded ? 'ql-expanded' : ''">
                                                    <span class="ql-picker-label ql-non-selectable" x-on:click="expanded=!expanded" x-on:click.outside="expanded=false" tabindex="0">
                                                        {{ $customTextDropdowns[$entry]['label'] }}
                                                        <svg viewBox="0 0 18 18"><polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon><polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon></svg>
                                                    </span>
                                                    <span class="ql-picker-options">
                                                        @foreach ($customTextDropdowns[$entry]['options'] as $value)
                                                            @if (array_key_exists($value, $customTextButtons))
                                                                <button class="ql-{{ $value }} ql-text-button ql-picker-item">{{ $customTextButtons[$value] }}</button>
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </span>
                                            @elseif (array_key_exists($entry, $customIconButtons))
                                                <button class="ql-{{ $entry }}">{!! $customIconButtons[$entry] !!}</button>
                                            @elseif (array_key_exists($entry, $customTextButtons))
                                                <button class="ql-{{ $entry }} ql-text-button">{{ $customTextButtons[$entry] }}</button>
                                            @elseif (array_key_exists($entry, $defaultButtons))
                                                <button class="ql-{{ $defaultButtons[$entry][0] }}"
                                                    {{ array_key_exists('value', $defaultButtons[$entry]) ? 'value='.$defaultButtons[$entry]['value'] : '' }}></button>
                                            @elseif (array_key_exists($entry, $defaultDropdowns))
                                                <select class="ql-{{ $defaultDropdowns[$entry][0] }}">
                                                    @if (array_key_exists('options', $defaultDropdowns[$entry]))
                                                        @foreach ($defaultDropdowns[$entry]['options'] as $value)
                                                            <option value="{{ $value }}"></option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            @endif
                                        @endforeach
                                    </span>
                                @endforeach
                            </div>
                        @endif
                        @if (!empty($toolbarLeft))
                            <div class="ql-toolbar-left">
                                @foreach ($toolbarLeft as $group)
                                    <span class="ql-formats">
                                        @foreach ($group as $entry)
                                            @if (array_key_exists($entry, $customIconDropdowns))
                                                <span x-data="{ expanded: false }" class="ql-picker ql-icon-picker ql-picker-custom" :class="expanded ? 'ql-expanded' : ''">
                                                    @if (array_key_exists($customIconDropdowns[$entry]['label'], $customIconButtons))
                                                        <button class="ql-{{ $customIconDropdowns[$entry]['label'] }} ql-picker-label"
                                                            x-on:click="expanded=!expanded" x-on:click.outside="expanded=false">
                                                            {{ $customIconButtons[$customIconDropdowns[$entry]['label']] }}</button>
                                                    @elseif (array_key_exists($customIconDropdowns[$entry]['label'], $defaultButtons))
                                                        <button class="ql-{{ $defaultButtons[$customIconDropdowns[$entry]['label']][0] }} ql-picker-label"
                                                            x-on:click="expanded=!expanded" x-on:click.outside="expanded=false"
                                                            {{ array_key_exists('value', $defaultButtons[$customIconDropdowns[$entry]['label']]) ? 'value='.$defaultButtons[$customIconDropdowns[$entry]['label']]['value'] : '' }}></button>
                                                    @endif
                                                    <span class="ql-picker-options">
                                                        @foreach ($customIconDropdowns[$entry]['options'] as $value)
                                                            @if (array_key_exists($value, $customIconButtons))
                                                                <button class="ql-{{ $value }} ql-picker-item">{!! $customIconButtons[$value] !!}</button>
                                                            @elseif (array_key_exists($value, $defaultButtons))
                                                                <button class="ql-{{ $defaultButtons[$value][0] }} ql-picker-item"
                                                                    {{ array_key_exists('value', $defaultButtons[$value]) ? 'value='.$defaultButtons[$value]['value'] : '' }}></button>
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </span>
                                            @elseif (array_key_exists($entry, $customTextDropdowns))
                                                <span x-data="{ expanded: false }" class="ql-picker ql-picker-custom" :class="expanded ? 'ql-expanded' : ''">
                                                    <span class="ql-picker-label ql-non-selectable" x-on:click="expanded=!expanded" x-on:click.outside="expanded=false" tabindex="0">
                                                        {{ $customTextDropdowns[$entry]['label'] }}
                                                        <svg viewBox="0 0 18 18"><polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon><polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon></svg>
                                                    </span>
                                                    <span class="ql-picker-options">
                                                        @foreach ($customTextDropdowns[$entry]['options'] as $value)
                                                            @if (array_key_exists($value, $customTextButtons))
                                                                <button class="ql-{{ $value }} ql-text-button ql-picker-item">{{ $customTextButtons[$value] }}</button>
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </span>
                                            @elseif (array_key_exists($entry, $customIconButtons))
                                                <button class="ql-{{ $entry }}">{!! $customIconButtons[$entry] !!}</button>
                                            @elseif (array_key_exists($entry, $customTextButtons))
                                                <button class="ql-{{ $entry }} ql-text-button">{{ $customTextButtons[$entry] }}</button>
                                            @elseif (array_key_exists($entry, $defaultButtons))
                                                <button class="ql-{{ $defaultButtons[$entry][0] }}"
                                                    {{ array_key_exists('value', $defaultButtons[$entry]) ? 'value='.$defaultButtons[$entry]['value'] : '' }}></button>
                                            @elseif (array_key_exists($entry, $defaultDropdowns))
                                                <select class="ql-{{ $defaultDropdowns[$entry][0] }}">
                                                    @if (array_key_exists('options', $defaultDropdowns[$entry]))
                                                        @foreach ($defaultDropdowns[$entry]['options'] as $value)
                                                            <option value="{{ $value }}"></option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            @endif
                                        @endforeach
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif
                <div class="min-h-[240px] max-h-[440px]" id="quill-editor-{{ $quillId }}"
                    x-data="{ quill: null }"
                    x-init="
                        @foreach ($registerModules as $register)
                            Quill.register({{ $register }});
                        @endforeach

                        quill = new Quill('#quill-editor-{{ $quillId }}', {
                            theme: 'snow',
                            modules: {
                                toolbar: {
                                    container: '#quill-toolbar-{{ $quillId }}',
                                    handlers: {
                                        @foreach ($customActions as $name => $action)
                                            '{{ $name }}': {{ $action ? $action : 'function () {}' }},
                                        @endforeach
                                        undo: function () {
                                            this.quill.history.undo();
                                        },
                                        redo: function () {
                                            this.quill.history.redo();
                                        }
                                    }
                                },
                                history: {
                                    delay: 1000,
                                    maxStack: 100,
                                    userOnly: true
                                },
                                @foreach ($otherModules as $name => $module)
                                    '{{ $name }}': {{ $module }},
                                @endforeach
                            }
                        });
                        quill.root.innerHTML = state;
                        quill.on('text-change', function () {
                            $dispatch('quill-change', quill.root.innerHTML);
                        });

                        {{ $isDisabled ? 'quill.disable()' : '' }}
                    "
                    x-on:quill-change.debounce.500ms="state = $event.detail"
                ></div>

                <input x-bind:value="state" hidden>
            </div>
        </x-filament::input.wrapper>
    </div>

    @if ($isProse)
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                document.getElementById('quill-editor-{{ $quillId }}').firstElementChild.classList.add('!prose', 'dark:!prose-invert', '!max-w-full');
            });
        </script>
    @else
        <style>
            #quill-editor-{{ $quillId }} .ql-editor * {
                all: initial !important;
            }
        </style>
    @endif
</x-dynamic-component>
