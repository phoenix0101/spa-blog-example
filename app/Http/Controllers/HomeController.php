<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Request as R;
use \App\Events\BanListEvent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
    public function index()
    {
        return view('home');
    }
     */
    public function __construct(){
         event(new BanListEvent);
    }

    public function main(){
        $ip = R::ip();
        $banned = Cache::get('banned',null);
        Log::info([$banned,$ip]);
        if(in_array($ip, $banned))
                return abort(404);
        return view('main');
    }
    public function panel(){
        return view('admin');
    }
    public function unit1(){
        return view('test');
    }
}