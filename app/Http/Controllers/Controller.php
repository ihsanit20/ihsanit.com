<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function getClientDomainFromRequest($request)
    {
        $origin = $request->header('Origin');
        $referer = $request->header('Referer');
        $domain = $origin ?? $referer;

        return rtrim(preg_replace('/^http(|s):\/\/(www\.|)|www\./', '', $domain), '/');
    }
}
