<?php


namespace App\Http\Controllers\Oauth;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class DiscordController
{
    public function index()
    {
        $link = 'https://www.facebook.com/v10.0/dialog/oauth?';
        $parameters = [
            'client_id' => env('OAUTH_DISCORD_CLIENT_ID'),
            'client_secret' => env('OAUTH_DISCORD_CLIENT_SECRET'),
            'code' => \request()->get('code'),
            'redirect_uri' => env('OAUTH_GITHUB_REDIRECT_URI')
        ];
        $link .= http_build_query($parameters);
        $response = Http::post($link);
        $result = [];
        parse_str($response->body(), $result);
        dd($response);
        $response = Http::withHeaders(['Authorization' => 'token ' . $result['access_token']])
            ->get('https://api.github.com/user');
        $userInfo = $response->json();
        $response = Http::withHeaders(['Authorization' => 'token ' . $result['access_token']])
            ->get('https://api.github.com/user/emails');
        $userEmail = $response->json();


        $email = $userEmail[0]['email'];
        $userName=$userInfo['name']??$userInfo['login']??'Bunny';
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
