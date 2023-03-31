<?php

namespace Src\Agenda\User\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Src\Agenda\User\Domain\Factories\UserEloquentModelFactory;

/**
 * @method whereMobile(string $mobile)
 * @method whereId(int $userId)
 */
class UserEloquentModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * @var string
     */
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'is_active',
        'firstname',
        'lastname',
        'gender',
        'mobile',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function roles()
    {
        return $this->belongsToMany(RoleEloquentModel::class, "role_user", 'user_id', 'role_id')
            ->using(RoleUserEloquentModel::class);
    }

    /**
     * @return UserEloquentModelFactory
     */
    protected static function newFactory()
    {
        return new UserEloquentModelFactory();
    }

    /** @return integer */
    public function getId()
    {
        return $this->id;
    }

    /** @return Collection */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /** @return Collection */
    public function getRoles()
    {
        return $this->roles;
    }

    /** @return string */
    public function getFirstName()
    {
        return $this->firstname;
    }

    /** @return string */
    public function getLastName()
    {
        return $this->lastname;
    }

    /** @return string */
    public function getGender()
    {
        return $this->gender;
    }

    /** @return string */
    public function getMobile()
    {
        return $this->mobile;
    }

    /** @return boolean */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /** @return \DateTime */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}
