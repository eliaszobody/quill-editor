<?php

namespace Eliaszobody\QuillEditor;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Livewire\Livewire;

class QuillEditorServiceProvider extends PackageServiceProvider
{
    public static string $name = 'quill-editor';

    public static string $viewNamespace = 'quill-editor';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasViews(static::$viewNamespace)
            ->hasConfigFile();
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        Livewire::component('quill-editor', QuillEditor::class);

        FilamentAsset::register(
            assets: $this->getAssets(),
            package: 'eliaszobody/quill-editor'
        );
    }

    protected function getAssetPackageName(): ?string
    {
        return 'eliaszobody/quill-editor';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('quill-editor', __DIR__ . '/../resources/dist/components/quill-editor.js'),
            Css::make('quill-editor-styles', __DIR__ . '/../resources/dist/quill-editor.css'),
            Js::make('quill-editor-scripts', __DIR__ . '/../resources/dist/quill-editor.js'),
        ];
    }
}
