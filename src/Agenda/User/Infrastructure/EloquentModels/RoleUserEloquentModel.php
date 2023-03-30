<?php

namespace Src\Agenda\User\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUserEloquentModel extends Pivot
{
    /**
     * @var string
     */
    protected $table = "role_user";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(UserEloquentModel::class, "users", 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(RoleEloquentModel::class, "roles", 'role_id', 'id');
    }
}
