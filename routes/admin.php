<?php

use App\Application\Admin\Controllers\ArticleController;
use App\Application\Admin\Controllers\CategoriesController;
use App\Application\Admin\Controllers\DashboardController;
use App\Application\Admin\Controllers\MediaController;
use App\Application\Admin\Controllers\RolesController;
use App\Application\Admin\Controllers\TagsController;
use App\Application\Admin\Controllers\UsersController;
use App\Domain\User\Enums\Role;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware(['role:' . Role::ADMIN->value . '|' . Role::SYSTEM_ADMIN->value])
    ->group(function () {
        Route::resource('/', DashboardController::class)->only(['index'])
            ->names('admin.dashboard');
        Route::resource('articles', ArticleController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('tags', TagsController::class);
        Route::resource('users', UsersController::class)->except(['edit', 'update']);
        Route::resource('roles', RolesController::class);
        Route::post('/upload/image', MediaController::class);
    });
