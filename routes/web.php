<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/localgroups', function () {
    return Inertia::render('LocalGroups');
})->name('localgroups');

Route::get('/access_control', function () {
    return Inertia::render('AccessControl');
})->name('access_control');

Route::get('/firewall', function () {
    return Inertia::render('Firewall');
})->name('firewall');

Route::get('/vpns', function () {
    return Inertia::render('Vpns');
})->name('vpns');

Route::get('/reports', function () {
    return Inertia::render('Reports');
})->name('reports');

Route::get('/traffic_control', function () {
    return Inertia::render('TrafficControl');
})->name('traffic_control');

Route::prefix('/networks')->group(function () {

    Route::get('/', function () {
        return Inertia::render('Networks');
    })->name('networks');

    Route::get('/custom_dns_record', function () {
        return Inertia::render('CustomDnsRecord');
    })->name('custom_dns_record');

    Route::get('/conditional_forwarding_dns', function () {
        return Inertia::render('ConditionalForwardingDns');
    })->name('conditional_forwarding_dns');

});

Route::prefix('/clientips')->group(function () {

    Route::get('/', function () {
        return Inertia::render('ClientIps');
    })->name('clientips');

    Route::get('/ignored_macs', function () {
        return Inertia::render('IgnoredMacs');
    })->name('ignored_macs');

});

Route::prefix('/users')->group(function () {

    Route::get('/', function () {
        return Inertia::render('Users', [
            'time' => now()->toTimeString(),
        ]);
    })->name('users');

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    })->name('settings');
    
});

Route::post('/logout', function () {
    dd('logging the user out');
})->name('logout');

Route::fallback(function () {
    return redirect()->route('dashboard');
});
