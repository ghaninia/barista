<?php

namespace Src\Agenda\Setting\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Agenda\Setting\Application\DTO\UpdateSettingDTO;
use Src\Agenda\Setting\Domain\Factories\SettingEloquentModelFactory;
use Src\Agenda\Setting\Infrastructure\EloquentModels\Casts\SettingValueCast;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;

/**
 * @method whereKey(UpdateSettingDTO $dto)
 */
class SettingEloquentModel extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'settings';
    protected $fillable = [
        'update_by',
        'create_by',
        'key',
        'value'
    ];

    protected $casts = [
        'value' => SettingValueCast::class
    ];

    /**
     * @return SettingEloquentModelFactory
     */
    protected static function newFactory()
    {
        return new SettingEloquentModelFactory();
    }
    public function updateBy()
    {
        return $this->belongsTo(UserEloquentModel::class, 'update_by');
    }

    public function createBy()
    {
        return $this->belongsTo(UserEloquentModel::class, 'create_by');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUpdateById()
    {
        return $this->update_by;
    }

    public function getCreateById()
    {
        return $this->create_by;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
