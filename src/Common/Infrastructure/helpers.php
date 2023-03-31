<?php


if (! function_exists('authorize')) {

    function authorize(string|array $abilities,string $policy,bool $exact = false): bool {
        \Src\Auth\Application\Authorization::getInstance()
            ->setExact($exact)
            ->setAbilities($abilities)
            ->setPolicy($policy)
            ->execute();
    }
}
