<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'init'])->name('init');

Route::get('/schedule', [PageController::class, 'schedule'])->name('schedule');

Route::get('/movies/{event?}', [PageController::class, 'movies'])->name('movies');

Route::get('/movie/{movie}', [PageController::class, 'movie'])->name('movie');

Route::get('/discussion-panels', [PageController::class, 'discussionPanels'])->name('discussion-panels');

Route::get('/locations', [PageController::class, 'locations'])->name('locations');

Route::get('/location/{location}', [PageController::class, 'location'])->name('location');

Route::get('/user-tickets', [PageController::class, 'tickets'])->name('tickets');

Route::post('/ticket', [PageController::class, 'generateTicket'])->name('generate.ticket');

Route::get('/partners', [PageController::class, 'partners'])->name('partners');