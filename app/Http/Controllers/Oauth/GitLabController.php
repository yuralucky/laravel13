<?php


namespace App\Http\Controllers\Oauth;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class GitLabController
{
    public function index()
    {
        $link = 'https://gitlab.com/oauth/token?';
        $parameters = [
            'client_id' => env('OAUTH_GITLAB_CLIENT_ID'),
            'client_secret' => env('OAUTH_GITLAB_CLIENT_SECRET'),
            'code' => \request()->get('code'),
            'redirect_uri' => env('OAUTH_GITLAB_REDIRECT_URI'),
            'grant_type'=>'authorization_code'
        ];
        $link .= http_build_query($parameters);
        $response = Http::post($link);
        $result = $response->json();
        $response=Http::get('https://gitlab.com/api/v4/user?access_token='.$result['access_token']);
        $userInfo = $response->json();

        $email = $userInfo['email'];
        $userName=$userInfo['username']??$userInfo['name']??'Bunny';
        if (null === ($user = User::where('email', $email)->first())) {
            $data = [
                'name' => $userName,
                'email' => $email,
                'password' => Hash::make('123456')
            ];
            $user = User::create($data);

        }
        Auth::login($user);
        return redirect()->route('all-posts')->with('success', 'Message');
    }
}
