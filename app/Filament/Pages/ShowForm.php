<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ShowForm extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.show-form';
    protected static ?string $permission = 'form-show';

    public function mount():void
{
    abort_unless(auth()->User()->canAccess(static::$permission), 403);
}
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}
