<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrator extends Authenticatable
{
    protected $table = 'administrators';
    protected $fillable = ["*"];
    protected $hidden = [
        'password'
    ];


}
