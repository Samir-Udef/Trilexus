<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function createAvatarUrl()
    {
        switch (Auth::user()->provider) {
            case 'google':
            $url = str_replace('sz=50', 'sz=150', Auth::user()->avatar) ;
            return $url;
            break;
            case 'facebook':
            return 'https://graph.facebook.com/'. Auth::user()->provider_id.'/picture?width=150&height=150';
            break;
        }

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avatarUrl = $this->createAvatarUrl();
        return view('home')->with('avatarUrl',$avatarUrl);

    }

    
}
