<?php

namespace Eliaszobody\QuillEditor;

use Closure;
use Filament\Forms\Components\Field;
use Illuminate\Contracts\Support\Htmlable;
use Livewire\Attributes\Js;

class QuillEditor extends Field
{
    protected string $view = 'quill-editor::quill-editor';

    protected $resizable = false;

    protected $toolbarLeft = [];
    protected $toolbarRight = [];

    protected $customActions = [];
    protected $customIconButtons = [];
    protected $customTextButtons = [];
    protected $customIconDropdowns = [];
    protected $customTextDropdowns = [];

    public function toolbar(Closure | array $left = [], Closure | array $right = []): static
    {
        $this->toolbarLeft = $left;
        $this->toolbarRight = $right;

        return $this;
    }

    public function resizable(bool $resizable = true): static
    {
        $this->resizable = $resizable;

        return $this;
    }

    public function isResizable(): bool
    {
        return $this->resizable;
    }

    public function customButton(Closure | string $name, Closure | string | Htmlable $display, Closure | string $action, bool $icon = false): static
    {
        $this->customActions[$name] = $action;

        if ($icon) {
            $this->customIconButtons[$name] = $display;
        } else {
            $this->customTextButtons[$name] = $display;
        }

        return $this;
    }

    public function customDropdown(Closure | string $name, Closure | array $options, Closure | bool $icon = false, Closure | string | Htmlable | null $label = null): static
    {
        if ($icon) {
            $this->customIconDropdowns[$name] = [
                'label' => $label,
                'options' => $options,
            ];
        } else {
            $this->customTextDropdowns[$name] = [
                'label' => $label,
                'options' => $options,
            ];
        }

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

    public function getCustomIconButtons(): array
    {
        return $this->customIconButtons;
    }

    public function getCustomIconDropdowns(): array
    {
        return $this->customIconDropdowns;
    }

    public function getCustomTextButtons(): array
    {
        return $this->customTextButtons;
    }

    public function getCustomTextDropdowns(): array
    {
        return $this->customTextDropdowns;
    }
}

