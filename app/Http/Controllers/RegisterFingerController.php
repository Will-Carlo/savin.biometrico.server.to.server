<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterFingerController extends Controller
{
    public function index(Request $request) {
        return view('register_finger');
     }
}
