<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'guard_name',
    ];

    /**
     * Os atributos que devem ser tratados como datas.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
