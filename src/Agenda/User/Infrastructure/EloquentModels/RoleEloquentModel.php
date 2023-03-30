<?php

namespace Src\Agenda\User\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Agenda\User\Domain\Factories\RoleEloquentModelFactory;

class RoleEloquentModel extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "roles";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(PermissionEloquentModel::class, "permission_role", 'role_id', 'permission_id')
                ->using(PermissionRoleEloquentModel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(UserEloquentModel::class, "role_user", 'role_id', 'user_id')
            ->using(RoleUserEloquentModel::class);
    }

    /**
     * @return RoleEloquentModel
     */
    protected static function newFactory()
    {
        return new RoleEloquentModelFactory();
    }

    /** @return int */
    public function getId()
    {
        return $this->id;
    }

    /** @return string */
    public function getName()
    {
        return $this->name;
    }
}
