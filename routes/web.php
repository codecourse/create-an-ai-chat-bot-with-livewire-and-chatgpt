<?php

use App\Livewire\Chat;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::get('/', Chat::class);
Route::get('/counter', Counter::class);
