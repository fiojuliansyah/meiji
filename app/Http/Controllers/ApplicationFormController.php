<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationFormController extends Controller
{
    function index() {
        return view('user.jobapplicationform');
    }
}
