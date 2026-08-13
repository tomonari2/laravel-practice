<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

class LineAuthController extends Controller
{
    /**
     * LINEログイン画面へリダイレクトする
     */
    public function redirect()
    {
        $state = Str::random(40);

        session([
            'line_login_state' => $state,
        ]);

        $query = http_build_query([
            'response_type' => 'code',
            'client_id' => config('services.line.channel_id'),
            'redirect_uri' => config('services.line.callback_url'),
            'state' => $state,
            'scope' => 'profile openid',
        ]);

        return redirect(
            'https://access.line.me/oauth2/v2.1/authorize?' . $query
        );
    }
}