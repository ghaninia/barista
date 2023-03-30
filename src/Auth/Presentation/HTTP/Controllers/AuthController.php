<?php

namespace Src\Auth\Presentation\HTTP\Controllers;

use Src\Auth\Presentation\HTTP\Requests\SsoRequest;
use Src\Common\Infrastructure\Laravel\Controller;

class AuthController extends Controller
{
    /**
     * @param SsoRequest $request
     * @return array
     */
    public function sso(SsoRequest $request)
    {
        return $request->all();
    }
}
