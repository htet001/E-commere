<?php

namespace App\Controllers;

use App\classes\Auth;
use App\classes\Redirect;

class AdminController
{
    public function index()
    {
        if (Auth::check()) {
            view("admin/home");
        } else {
            Redirect::to("/");
        }
    }
}
