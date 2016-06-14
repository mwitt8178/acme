<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use App\Customer;
use GuzzleHttp;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * @return home.blade.php
     */
    public function index(){
        $data['customer_count'] = count(Customer::all());
        $data['user_count'] = count(User::all());

        return view('home', $data);
    }

    public function showUserProfile(){
        return view('dashboard.profile');
    }
}
