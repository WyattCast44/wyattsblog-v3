<?php

namespace App\Support\Uuids\Observers;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class ModelUuidObserver
{
    public function created(Model $model)
    {
        $model->update([
            'uuid' => (string) Str::uuid(),
        ]);
    }
}
