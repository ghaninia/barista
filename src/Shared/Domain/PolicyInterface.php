<?php

namespace Src\Shared\Domain;

interface PolicyInterface
{

    /**
     * @return array<string, PermissionInterface>
     */
    public function mapper();
}
