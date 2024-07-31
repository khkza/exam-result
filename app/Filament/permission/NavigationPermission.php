<?php

namespace App\Filament\Permission;

trait NavigationPermission
{
    public static function shouldRegisterNavigation(): bool
    {

        if (static::$shouldRegisterNavigation && isset(static::$permission)) {
            return auth()->User()->canAccess(static::$permission);
        }

        return static::$shouldRegisterNavigation;
    }
}
