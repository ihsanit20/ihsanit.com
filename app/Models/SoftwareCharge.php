<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareCharge extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'response' => 'json',
        ];
    }
}
