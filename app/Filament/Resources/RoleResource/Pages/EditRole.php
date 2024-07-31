<?php

namespace App\Filament\Resources\RoleResource\Pages;

use Filament\Actions;
use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Tables\Actions\DeleteAction;
use App\Filament\Permission\PagePermission;

class EditRole extends EditRecord
{
    use PagePermission;

    protected static ?string $permission = 'role-edit';

    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
            if (auth()->user()->canAccess('role-delete')) {
                return [
                    Actions\DeleteAction::make(),
                ];
            }

        return [];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
