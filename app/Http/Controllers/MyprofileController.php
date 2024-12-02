<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;

class MyprofileController extends Controller
{
    public function index() {
        $user = auth()->user();
        $appliedCareers = Applicant::where('user_id', $user->id)->get();
        return view('user/appliedjob', compact('appliedCareers'));
    }


    public function appliedCareer(){
         $user = auth()->user();
        $appliedCareers = Applicant::where('user_id', $user->id)->get();
        return view('user/appliedjob', compact('appliedCareers'));
    }
}
