<?php

namespace App\Filament\Permission;

trait  PagePermission
{



    public static function  authorizeResourceAccess(): void
    {


        if (   isset(static::$permission)) {

            if (! auth()->User()->canAccess(static::$permission)) {
                // dd(static::$permission);
                redirect()->route('filament.admin.pages.forbidden');

            }
        }
        // return static::$authorizeResourceAccess;



        // if (isset(static::$permission) && !authUser()->canAccess(static::$permission)) {

        //     throw new \Exception("Unauthorized access: " . static::$permission);
        // }
    }
}
