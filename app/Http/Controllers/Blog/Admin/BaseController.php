<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController as GuestBaseController;

/**
 * This is parent class for all nested classes of admin panel.
 *
 * Must be as a parent for all blog managing controllers.
 *
 * Class BaseController
 * @package App\Http\Controllers\Blog\Admin
 */
abstract class BaseController extends GuestBaseController
{
    /**
     * BaseController constructor.
     */
    public function __construct()
    {
    }

}

