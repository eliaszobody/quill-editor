<?php
    $toolbarLeft = $getToolbarLeft();
    $toolbarRight = $getToolbarRight();
    $customButtons = $getCustomButtons();
    $customDropdowns = $getCustomDropdowns();
    $defaultButtons = [
        'bold' => ['bold'],
        'italic' => ['italic'],
        'underline' => ['underline'],
        'strikethrough' => ['strike'],
        'link' => ['link'],
        'code' => ['code'],
        'codeblock' => ['code-block'],
        'blockquote' => ['blockquote'],
        'subscript' => ['script', 'value' => 'sub'],
        'superscript' => ['script', 'value' => 'super'],
        'indent' => ['indent', 'value' => '+1'],
        'outdent' => ['indent', 'value' => '-1'],
        'bulletlist' => ['list', 'value' => 'bullet'],
        'orderedlist' => ['list', 'value' => 'ordered'],
        'checklist' => ['list', 'value' => 'check'],
        'leftalign' => ['align'],
        'centeralign' => ['align', 'value' => 'center'],
        'rightalign' => ['align', 'value' => 'right'],
        'justifyalign' => ['align', 'value' => 'justify'],
        'rtl' => ['direction', 'value' => 'rtl'],
        'ltr' => ['direction', 'value' => 'ltr'],
        'formula' => ['formula'],
        'image' => ['image'],
        'video' => ['video'],
    ];
    $defaultDropdowns = [
        'bg-color' => ['background'],
        'text-color' => ['color'],
        'font-family' => ['font'],
        'text-size' => ['size'],
        'align-items' => ['align'],
        'header-1-6' => ['header', 'options' => [1,2,3,4,5,6]],
        'header-2-6' => ['header', 'options' => [2,3,4,5,6]],
        'header-3-6' => ['header', 'options' => [3,4,5,6]],
        'header-4-6' => ['header', 'options' => [4,5,6]],
        'header-5-6' => ['header', 'options' => [5,6]],
        'header-1-5' => ['header', 'options' => [1,2,3,4,5]],
        'header-2-5' => ['header', 'options' => [2,3,4,5]],
        'header-3-5' => ['header', 'options' => [3,4,5]],
        'header-4-5' => ['header', 'options' => [4,5]],
        'header-1-4' => ['header', 'options' => [1,2,3,4]],
        'header-2-4' => ['header', 'options' => [2,3,4]],
        'header-3-4' => ['header', 'options' => [3,4]],
        'header-1-3' => ['header', 'options' => [1,2,3]],
        'header-2-3' => ['header', 'options' => [2,3]],
        'header-1-2' => ['header', 'options' => [1,2]],
    ];
?>

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <x-filament::input.wrapper>
            <div class="ql-wrapper" wire:ignore>
                <div id="quill-toolbar">
                    @if (!empty($toolbarRight))
                        <div class="ql-toolbar-right">
                            @foreach ($toolbarRight as $group)
                                <span class="ql-formats">
                                    @foreach ($group as $entry)
                                        @if (array_key_exists($entry, $customDropdowns))
                                            <span x-data="{ expanded: false }" class="ql-picker {{ $customDropdowns[$entry]['icon'] ? 'ql-icon-picker ql-expanded' : '' }}">
                                                <span :class="expanded ? 'ql-active' : ''" class="ql-picker-label">{!! $customDropdowns[$entry]['label'] !!}</span>
                                                <span x-show="expanded" class="ql-picker-options">
                                                    @foreach ($customDropdowns[$entry]['options'] as $value)
                                                        @if (array_key_exists($value, $customButtons))
                                                            <button class="ql-{{ $value }}">{!! $customButtons[$value]['value'] !!}</button>
                                                        @elseif (array_key_exists($value, $defaultButtons))
                                                            <button class="ql-{{ $defaultButtons[$value][0] }}"
                                                                {{ array_key_exists('value', $defaultButtons[$value]) ? 'value='.$defaultButtons[$value]['value'] : '' }}></button>
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </span>
                                        @elseif (array_key_exists($entry, $customButtons))
                                            <button class="ql-{{ $entry }}">{!! $customButtons[$entry]['value'] !!}</button>
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
                                        @if (array_key_exists($entry, $customDropdowns))
                                            <span x-data="{ expanded: false }" class="ql-picker {{ $customDropdowns[$entry]['icon'] ? 'ql-icon-picker' : '' }}">
                                                <span :class="expanded ? 'ql-active' : ''" class="ql-picker-label">{!! $customDropdowns[$entry]['label'] !!}</span>
                                                <span x-show="expanded" class="ql-picker-options">
                                                    @foreach ($customDropdowns[$entry]['options'] as $value)
                                                        @if (array_key_exists($value, $customButtons))
                                                            <button class="ql-{{ $value }}">{!! $customButtons[$value]['value'] !!}</button>
                                                        @elseif (array_key_exists($value, $defaultButtons))
                                                            <button class="ql-{{ $defaultButtons[$value][0] }}"
                                                                {{ array_key_exists('value', $defaultButtons[$value]) ? 'value='.$defaultButtons[$value]['value'] : '' }}></button>
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </span>
                                        @elseif (array_key_exists($entry, $customButtons))
                                            <button class="ql-{{ $entry }}">{!! $customButtons[$entry]['value'] !!}</button>
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
                <div id="quill-editor" class="min-h-[240px] max-h-[440px]" style="width: 640px"
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
