<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class BrandSettings extends Model
{
    use HasFactory,HasRoles;

    protected $fillable = ['key_name', 'key_value'];
}
