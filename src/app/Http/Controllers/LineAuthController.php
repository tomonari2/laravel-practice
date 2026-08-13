<?php

namespace App\Http\Controllers;

use App\Infrastructure\Line\LineApiService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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

    /**
     * LINEからのコールバック
     */
    public function callback(Request $request, LineApiService $lineApiService)
    {
        // LINE側でエラーになった場合
        if ($request->has('error')) {
            return redirect('/')
                ->with('error', $request->error_description);
        }

        // stateを取得
        $state = $request->state;

        // セッションに保存していたstateと比較
        if (!$state || !hash_equals(
            session('line_login_state', ''),
            $state
        )) {
            abort(403, 'Invalid state.');
        }

        // 認可コードを取得
        $code = $request->code;

        if (!$code) {
            abort(400, 'Authorization code is missing.');
        }

        // 認可コードからアクセストークンを取得
        $token = $lineApiService->getAccessToken($code);

        // 確認用
        dd($token);
    }
}