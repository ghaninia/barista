<?php

namespace Src\Common\Domain;

interface PolicyInterface
{

    /**
     * @return array<string, PermissionInterface>
     */
    public function mapper();
}
