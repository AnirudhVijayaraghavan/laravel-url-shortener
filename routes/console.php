<?php

use App\Mail\DailyAdminEmail;
use App\Models\GuestShortURLS;
use App\Models\shortenedURLs;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
Schedule::call(function () {
    Mail::to('test@google.com')->send(new DailyAdminEmail());
})->everyMinute();
Schedule::call(function () {
    shortenedURLs::where('expiration_date', '<', now())->delete();
    GuestShortURLS::where('expiration_date', '<', now())->delete();

})->everyMinute();