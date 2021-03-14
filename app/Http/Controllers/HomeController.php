<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $link = 'https://github.com/login/oauth/authorize?';

        $parameters = [
            'client_id' => env('OAUTH_GITHUB_CLIENT_ID'),
            'redirect_uri' => env('OAUTH_GITHUB_REDIRECT_URI'),
            'scope' => 'user,user:email'
        ];
        $link .= http_build_query($parameters);
        return view('login/index',compact('link'));
    }
}
