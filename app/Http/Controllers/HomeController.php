<?php

namespace App\Http\Controllers;

use Elliptic\EC;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth')->except('verify');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('home');
    }

    public function verify()
    {

    }

    public function genSignature(Request $request)
    {
        $pk = env('ELA_PRIVATE_KEY');
        $ec = new EC('p256');
        $priv = $ec->keyFromPrivate($pk);
        dd($priv->getPublic(true, 'hex'));
    }

    public function authQr()
    {

    }
}
