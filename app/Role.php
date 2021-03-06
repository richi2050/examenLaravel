<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 1;
    const EMPLOYEE = 2;

    protected $table = 'roles';
    protected $fillable = [
        'name',
        'description'
    ];
}
