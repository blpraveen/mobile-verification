<?php

use Illuminate\Support\Facades\Route;

$verifyRoute = config('mobile_verifier.routes.verify', 'phone/verify');
$resendRoute = config('mobile_verifier.routes.resend', 'phone/resend');

Route::get($verifyRoute, 'PhoneNumberVerifyController@show')->name('phoneverification.show');
Route::post($verifyRoute, 'PhoneNumberVerifyController@verify')->name('phoneverification.verify');