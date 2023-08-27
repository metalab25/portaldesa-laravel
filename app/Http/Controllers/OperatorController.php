<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperatorController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'user'  => Auth::user()
        ]);
    }
}
