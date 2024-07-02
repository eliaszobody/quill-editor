<?php

namespace Eliaszobody\QuillEditor;

use Closure;
use Filament\Forms\Components\Field;
use Illuminate\Contracts\Support\Htmlable;

class QuillEditor extends Field
{
    protected string $view = 'quill-editor::quill-editor';

    protected bool $resizable = false;

    protected ?array $toolbarLeft = null;
    protected ?array $toolbarRight = null;

    public function toolbar(Closure | array | null $left = [], Closure | array | null $right = []): static
    {
        $this->toolbarLeft = $this->evaluate($left);
        $this->toolbarRight = $this->evaluate($right);

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

    public function getToolbarLeft(): array
    {
        return $this->toolbarLeft ?? config('quill-editor.toolbars.defaultLeft');
    }

    public function getToolbarRight(): array
    {
        return $this->toolbarRight ?? config('quill-editor.toolbars.defaultRight');
    }

    public function getCustomActions(): array
    {
        return config('quill-editor.customActions');
    }

    public function getCustomIconButtons(): array
    {
        return config('quill-editor.customIconButtons');
    }

    public function getCustomIconDropdowns(): array
    {
        return config('quill-editor.customIconDropdowns');
    }

    public function getCustomTextButtons(): array
    {
        return config('quill-editor.customTextButtons');
    }

    public function getCustomTextDropdowns(): array
    {
        return config('quill-editor.customTextDropdowns');
    }
}

