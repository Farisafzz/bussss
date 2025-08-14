<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin(){
        return view('livewire.admin.dashboard');
    }
    public function user(){
        return view('livewire.user.dashboard');
    }
}
