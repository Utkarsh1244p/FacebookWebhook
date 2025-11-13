<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;



Route::get('/facebook/webhook', function (Request $request) {
    // Facebook verification step
    $verify_token = env('FB_VERIFY_TOKEN');
    info($request->all());
    if ($request->input('hub_mode') === 'subscribe' &&
        $request->input('hub_verify_token') === $verify_token) {
        return response($request->input('hub_challenge'), 200);
    }
    return response('Invalid verification token', 403);
});

Route::post('/facebook/webhook', function (Request $request) {
    Log::info('Webhook received', $request->all());

    // Facebook sends the leadgen_id, we must fetch details via Graph API
    foreach ($request->input('entry', []) as $entry) {
        foreach ($entry['changes'] as $change) {
            $leadId = $change['value']['leadgen_id'];
            $pageId = $change['value']['page_id'];

            // Store temporarily or queue a job to fetch the lead details
            Log::info([
                'lead_id' => $leadId,
                'page_id' => $pageId,
                'raw_payload' => json_encode($change),
            ]);
        }
    }

    return response('Event received', 200);
});
