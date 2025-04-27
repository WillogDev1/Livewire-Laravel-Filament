<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Role;

class Shield extends Role
{
    // Carregar automaticamente o relacionamento 'permissions'
    protected $with = ['permissions'];

    // Relacionamento com permissões
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
            Permission::class, // Modelo relacionado
            'role_has_permissions', // Tabela pivot
            'role_id', // Chave estrangeira na tabela pivot
            'permission_id' // Chave relacionada na tabela pivot
        );
    }
}
