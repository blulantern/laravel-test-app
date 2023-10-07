<?php

namespace App\Models;

use App\Traits\Jsonable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Jsonable;

    protected $fillable = [
        'name',
        'phone',
        'country',
        'email',
        'city',
        'address',
        'region_state',
        'zip'    
    ];
}
