<?php

namespace App\controllers;

class IndexController extends BaseControllers
{
    public function show()
    {
        view("welcome");
    }
}
