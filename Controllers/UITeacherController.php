<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UITeacherController extends BaseController
{
    public function index()
    {
        return view("frontend/teacher/home");
    }
}