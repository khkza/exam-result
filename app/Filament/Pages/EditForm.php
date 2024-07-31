<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class EditForm extends Page
{
    protected static ?string $permission = 'form-edit';
    public function mount():void
    {
        abort_unless(auth()->User()->canAccess(static::$permission), 403);
    }
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.edit-form';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}
