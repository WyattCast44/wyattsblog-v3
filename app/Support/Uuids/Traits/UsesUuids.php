<?php

namespace App\Support\Uuids\Traits;

use App\Support\Uuids\Observers\ModelUuidObserver;

trait UsesUuids
{
    public static function bootUsesUuids()
    {
        static::observe(new ModelUuidObserver());
    }
}
