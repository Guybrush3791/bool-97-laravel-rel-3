<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FarmerController;

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
