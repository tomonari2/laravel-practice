<?php

namespace App\Infrastructure\Line;

use Illuminate\Support\Facades\Http;

class LineApiService
{
    public function getAccessToken(string $code)
    {
        $response = Http::asForm()->post(
            'https://api.line.me/oauth2/v2.1/token',
            [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => config('services.line.callback_url'),
                'client_id' => config('services.line.channel_id'),
                'client_secret' => config('services.line.channel_secret'),
            ]
        );

        $response->throw();

        return $response->json();
    }

    public function getUserInfo(string $accessToken): array
    {
        $response = Http::withToken($accessToken)
            ->get('https://api.line.me/oauth2/v2.1/userinfo');

        $response->throw();

        return $response->json();
    }
}
