<?php

namespace Src\Agenda\Setting\Application\Services;

use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Domain\Entities\Setting;
use Src\Agenda\Setting\Domain\Repositories\SettingRepositoryInterface;

class SettingSingleton
{

    /**
     * @var Setting[] $settings
     */
    private static array $settings;
    private function __construct() {
    }

    /**
     * @return SettingSingleton
     */
    public static function getInstance()
    {
        if (!isset(self::$settings)) {
            self::$settings = app(SettingRepositoryInterface::class)->getAll();
        }

        return new self();
    }

    /**
     * @param EnumKeySetting $key
     * @param mixed|null $default
     * @return mixed|Setting|null
     */
    public function get(EnumKeySetting $key, mixed $default = null)
    {
        foreach (self::$settings as $setting) {
            if ($setting->key === $key) {
                return $setting->value;
            }
        }
        return $default;
    }
}
