<?php


use Src\Common\Domain\PermissionInterface;

if (! function_exists('authorize')) {

    function authorize(PermissionInterface|array $abilities,string $policy,bool $exact = false): bool {
        \Src\Auth\Application\Authorization::getInstance()
            ->setExact($exact)
            ->setAbilities($abilities)
            ->setPolicy($policy)
            ->execute();
    }
}
