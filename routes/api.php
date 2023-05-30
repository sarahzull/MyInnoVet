<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\TwilioController;
use App\Mail\TestMail;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/testroute', function() {
    $name = "Funny Coder";

    // The email sending is done using the to method on the Mail facade
    Mail::to('muhammadsalehuddin1@gmail.com')->send(new TestMail($name));

    return response()->json(['message' => 'Email sent successfully']);
});

Route::post('/subscribe', function () {

    $name = "Funny Coder";

    Mail::to('s4rhzl@gmail.com')->send(new WelcomeMail($name));

    return new JsonResponse(
        [
            'success' => true, 
            'message' => "Message sent successfully"
        ], 
        200
    );
});

Route::get('/send-whatsapp-message', [TwilioController::class, 'sendWhatsAppMessage']);
Route::get('/test-query', [TestController::class, 'testQuery']);
