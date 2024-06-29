<?php

namespace Eliaszobody\QuillEditor;

use Closure;
use Filament\Forms\Components\Field;
use Livewire\Attributes\Js;

class QuillEditor extends Field
{
    protected string $view = 'quill-editor::quill-editor';

    protected $toolbarLeft = [];
    protected $toolbarRight = [];

    protected $customActions = [];
    protected $customButtons = [];
    protected $customDropdowns = [];

    public function toolbar(array | Closure $left = [], array | Closure $right = []): static
    {
        $this->toolbarLeft = $left;
        $this->toolbarRight = $right;

        return $this;
    }

    public function customButton(string $name, string $display, Js $action): static
    {
        $this->customActions[$name] = $action;

        $this->customButtons[$name] = $display;

        return $this;
    }

    public function customDropdown(string $name, array $options, bool $icon = false, ?string $label = null): static
    {
        $this->customDropdowns[$name] = [
            'icon' => $icon,
            'label' => $label,
            'options' => $options,
        ];

        return $this;
    }

    public function getToolbarLeft(): array
    {
        return $this->toolbarLeft;
    }

    public function getToolbarRight(): array
    {
        return $this->toolbarRight;
    }

    public function getCustomActions(): array
    {
        return $this->customActions;
    }

    public function getCustomButtons(): array
    {
        return $this->customButtons;
    }

    public function getCustomDropdowns(): array
    {
        return $this->customDropdowns;
    }
}

