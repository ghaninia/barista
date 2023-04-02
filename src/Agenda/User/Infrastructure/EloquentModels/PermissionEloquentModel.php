<?php

namespace Src\Agenda\User\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Agenda\User\Domain\Factories\PermissionEloquentModelFactory;

class PermissionEloquentModel extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "permissions";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return PermissionEloquentModelFactory
     */
    protected static function newFactory()
    {
        return new PermissionEloquentModelFactory();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(RoleEloquentModel::class, "permission_role", 'permission_id', 'role_id')
            ->using(PermissionRoleEloquentModel::class);
    }

    /** @return integer */
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
