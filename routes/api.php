<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/webhook/facebook', function (Request $request) {

     \Log::info('Facebook Webhook Called', [
        'method' => $request->method(),
        'all_params' => $request->all(),
        'query_params' => $request->query(),
        'raw_input' => $request->getContent()
    ]);

    // ✅ Step 1: Facebook verification (GET)
    if ($request->isMethod('get') && $request->has('hub_challenge')) {
        if ($request->get('hub_verify_token') === env('FB_VERIFY_TOKEN')) {
            return response($request->get('hub_challenge'), 200);
        }
        return response('Invalid verify token', 403);
    }

    // ✅ Step 2: Handle POST webhook (lead notification)
    if ($request->isMethod('post')) {
        \Log::info('Facebook Lead Received', $request->all());
    }
    
    return response('ok', 200);
});
