<?php

namespace App\Filament\Resources\RoleResource\Pages;

use Filament\Actions;
use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\CreateAction;
use App\Filament\Permission\PagePermission;

class ListRoles extends ListRecords
{
    use PagePermission;

    protected static ?string $permission = 'role-list';

    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        if (auth()->user()->canAccess('role-create')) {
            return [
                Actions\CreateAction::make(),
            ];
        }

        return [];
    }
}
