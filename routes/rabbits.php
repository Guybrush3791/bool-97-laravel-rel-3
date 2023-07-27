<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RabbitController;

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

Route :: delete('/rabbits/{id}/picture', [RabbitController :: class, 'deletePicture'])
    -> name('rabbit.picture.delete');
Route :: delete('/rabbits/{id}', [RabbitController :: class, 'delete'])
    -> name('rabbit.delete');

Route :: get('/rabbits/{id}', [RabbitController :: class, 'show'])
    -> name('rabbit.show');
