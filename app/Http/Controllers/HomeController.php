<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $link = 'https://gitlab.com/oauth/authorize?';

        $parameters = [
            'client_id' => env('OAUTH_GITLAB_CLIENT_ID'),
            'redirect_uri' => env('OAUTH_GITLAB_REDIRECT_URI'),
            'response_type' => 'code',
            'scope'=>'read_user'
        ];
        $link .= http_build_query($parameters);
        return view('login/index',compact('link'));
    }
}
