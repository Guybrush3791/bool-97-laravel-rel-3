<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RabbitController;
use App\Http\Controllers\FarmerController;

// RABBITS
Route :: get('/rabbits', [RabbitController :: class, 'index'])
    -> name('rabbit.index');

Route :: get('/rabbits/create', [RabbitController :: class, 'create'])
    -> name('rabbit.create');
Route :: post('/rabbits/store', [RabbitController :: class, 'store'])
    -> name('rabbit.store');

Route :: get('/rabbits/{id}/edit', [RabbitController :: class, 'edit'])
    -> name('rabbit.edit');
Route :: put('/rabbits/{id}/update', [RabbitController :: class, 'update'])
    -> name('rabbit.update');

Route :: delete('/rabbits/{id}', [RabbitController :: class, 'delete'])
    -> name('rabbit.delete');

Route :: get('/rabbits/{id}', [RabbitController :: class, 'show'])
    -> name('rabbit.show');

// FARMER
Route :: get('/farmers', [FarmerController :: class, 'index'])
    -> name('farmer.index');

Route :: get('/farmers/create', [FarmerController :: class, 'create'])
    -> name('farmer.create');
Route :: post('/farmers/store', [FarmerController :: class, 'store'])
    -> name('farmer.store');

Route :: get('/farmers/{id}/edit', [FarmerController :: class, 'edit'])
    -> name('farmer.edit');
Route :: put('/farmers/{id}/update', [FarmerController :: class, 'update'])
    -> name('farmer.update');

Route :: delete('/farmers/{id}', [FarmerController :: class, 'delete'])
    -> name('farmer.delete');

Route :: get('/farmers/{id}', [FarmerController :: class, 'show'])
    -> name('farmer.show');
