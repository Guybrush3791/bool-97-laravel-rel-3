<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;

require __DIR__ . '/rabbits.php';
require __DIR__ . '/farmers.php';

// TEST
Route :: get('/test', [TestController :: class, 'getForm'])
    -> name('test.form');
Route :: post('/test', [TestController :: class, 'readForm'])
    -> name('test.read');
