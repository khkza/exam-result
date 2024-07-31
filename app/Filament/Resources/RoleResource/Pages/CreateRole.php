<?php

namespace App\Filament\Resources\RoleResource\Pages;

use Filament\Actions;
use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Permission\PagePermission;

class CreateRole extends CreateRecord
{
    use PagePermission;

    protected static ?string $permission = 'role-create';

    protected static string $resource = RoleResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
