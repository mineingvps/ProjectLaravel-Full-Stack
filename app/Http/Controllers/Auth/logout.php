<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class logout extends Controller
{
    //

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('home');
    }
}
