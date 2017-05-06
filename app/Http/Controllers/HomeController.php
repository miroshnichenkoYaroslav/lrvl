<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function testCommunications() {
        $user = App\Models\User::first();
        $admin = App\Models\Role::where('slug', 'admin')->first();
        $user->roles->count(); //вернет 0
        $user->roles()->save($admin);
        $user = $user->fresh();
        $admin = $admin->fresh();
        $admin->users; // тут будет User к которому добавили роль
        $user->news()->create([
            'title' => 'Hello world!',
            'content' => '# Hello world content!!!'
        ]);
        App\Models\News::first()->user;
    }
}
