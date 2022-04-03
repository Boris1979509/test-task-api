<?php

namespace App\Http\Controllers\Api\Cabinet;

use App\Http\Controllers\Controller;

/**
 * Class HomeController
 * @package App\Http\Controllers\Api\Dashboard
 */
class HomeController extends Controller
{
    public function __invoke(): string
    {
        return 'Dashboard';
    }
}
