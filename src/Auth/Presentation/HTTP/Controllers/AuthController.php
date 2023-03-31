<?php

namespace Src\Auth\Presentation\HTTP\Controllers;

use Src\Auth\Presentation\HTTP\Requests\SsoRequest;
use Src\Auth\Presentation\HTTP\Requests\SsoVerificationRequest;
use Src\Common\Infrastructure\Laravel\Controller;

class AuthController extends Controller
{
    public function ssoRequest(SsoRequest $request)
    {
    }

    public function ssoVerification(SsoVerificationRequest $request)
    {
    }
}
