<?php

namespace Src\Agenda\Token\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Agenda\Token\Domain\Factories\TokenEloquentModelFactory;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;

class TokenEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'tokens';

    protected $fillable = [
        'user_id',
        'token',
        'type',
        'expired_at'
    ];

    public $casts = [
        'expired_at' => 'datetime'
    ];

    /**
     * @return TokenEloquentModelFactory
     */
    protected static function newFactory()
    {
        return new TokenEloquentModelFactory();
    }

    public function user()
    {
        return $this->belongsTo(UserEloquentModel::class, 'user_id');
    }

    /** @return int */
    public function getId(): int
    {
        return $this->id;
    }

    /** @return User */
    public function getUser(): UserEloquentModel
    {
        return $this->user;
    }

    /** @return string */
    public function getToken(): string
    {
        return $this->token;
    }

    /** @return string */
    public function getType(): string
    {
        return $this->type;
    }

    /** @return \DateTime */
    public function getExpiredAt(): \DateTime
    {
        return $this->expired_at;
    }

}
