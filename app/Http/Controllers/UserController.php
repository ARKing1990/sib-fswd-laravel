<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.user');
    }
    public function home()
    {
        return view('user.index');
    }
    public function create()
    {
        return view('user.add');
    }
    public function edit()
    {
        return view('user.edit');
    }
    public function users()
    {
        return view('user.users');
    }
}
