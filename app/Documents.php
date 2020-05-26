<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $table = 'documents';
    protected $fillable = [
        'user_id',
        'name',
        'ext',
        'type'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
