<?php

namespace Src\Agenda\User\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PermissionRoleEloquentModel extends Pivot
{
    /**
     * @var string
     */
    protected $table = "permission_role";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission()
    {
        return $this->belongsTo(PermissionEloquentModel::class, "permissions");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(RoleEloquentModel::class, "roles", 'role_id', 'id');
    }
}
