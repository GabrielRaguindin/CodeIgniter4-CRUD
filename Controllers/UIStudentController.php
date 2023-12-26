<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UIStudentController extends BaseController
{
    public function index()
    {
        return view("frontend/student/home");
    }
}