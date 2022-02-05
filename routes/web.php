<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login.form');
});

//Sign In - Form
Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginForm'])
->name('login.form');

//Sign In
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])
->name('login');

Route::middleware([App\Http\Middleware\IsLogin::class])->group(function () {

    //Sign Out
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout');

    //Home
    Route::get('/home', function () {
        if (request()->cookie('X-App') === 'simonik') {
            return redirect()->route('simonik.indicators.paper-work.index');
        } else if (request()->cookie('X-App') === 'fdx') {
            return redirect()->route('fdx.indicators.index');
        } else {
            return redirect()->route('logout');
        }
    })->name('home');

    //------------------------------------------------------------
    // SIMONIK
    //------------------------------------------------------------

    Route::middleware([\App\Http\Middleware\SIMONIK\Is__SIMONIK::class])->group(function () {
        //indicator
        Route::get('/simonik/indicators/create', [App\Http\Controllers\Simonik\IndicatorController::class, 'create'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.indicators.create');

        Route::post('/simonik/indicators', [App\Http\Controllers\Simonik\IndicatorController::class, 'store'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.indicators.store');

        Route::get('/simonik/indicators/{id}/edit', [App\Http\Controllers\Simonik\IndicatorController::class, 'edit'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
        ->name('simonik.indicators.edit');

        Route::put('/simonik/indicators/{id}', [App\Http\Controllers\Simonik\IndicatorController::class, 'update'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
        ->name('simonik.indicators.update');

        Route::get('/simonik/indicators/{id}/delete', [App\Http\Controllers\Simonik\IndicatorController::class, 'delete'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.indicators.delete');

        Route::delete('/simonik/indicators/{id}', [App\Http\Controllers\Simonik\IndicatorController::class, 'destroy'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.indicators.destroy');

        //paper work - indicator
        Route::get('/simonik/indicators/paper-work', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'index'])
        ->name('simonik.indicators.paper-work.index');

        Route::get('/simonik/indicators/paper-work/create', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'create'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
        ->name('simonik.indicators.paper-work.create');

        Route::post('/simonik/indicators/paper-work', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'store'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
        ->name('simonik.indicators.paper-work.store');

        Route::get('/simonik/indicators/paper-work/{level}/{unit}/{tahun}/edit', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'edit'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
        ->name('simonik.indicators.paper-work.edit');

        Route::put('/simonik/indicators/paper-work/{level}/{unit}/{tahun}', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'update'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
        ->name('simonik.indicators.paper-work.update');

        Route::get('/simonik/indicators/paper-work/{level}/{unit}/{tahun}/delete', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'delete'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
        ->name('simonik.indicators.paper-work.delete');

        Route::delete('/simonik/indicators/paper-work/{level}/{unit}/{tahun}', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'destroy'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
        ->name('simonik.indicators.paper-work.destroy');

        //reorder
        Route::put('/simonik/indicators/paper-work/reorder', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'reorder'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
        ->name('simonik.indicators.paper-work.reorder');

        //reference
        Route::get('/simonik/indicators/paper-work/reference/create', [App\Http\Controllers\Simonik\Extends\Indicator\IndicatorReferenceController::class, 'create'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.indicators.paper-work.reference.create');

        Route::post('/simonik/indicators/paper-work/reference', [App\Http\Controllers\Simonik\Extends\Indicator\IndicatorReferenceController::class, 'store'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.indicators.paper-work.reference.store');

        Route::get('/simonik/indicators/paper-work/reference/edit', [App\Http\Controllers\Simonik\Extends\Indicator\IndicatorReferenceController::class, 'edit'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
        ->name('simonik.indicators.paper-work.reference.edit');

        Route::put('/simonik/indicators/paper-work/reference/update', [App\Http\Controllers\Simonik\Extends\Indicator\IndicatorReferenceController::class, 'update'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
        ->name('simonik.indicators.paper-work.reference.update');

        //paper work - realization
        Route::get('/simonik/realizations/paper-work', [App\Http\Controllers\Simonik\Extends\Realization\PaperWorkRealizationController::class, 'index'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdminOrDataEntry::class])
        ->name('simonik.realizations.paper-work.index');

        Route::put('/simonik/realizations/paper-work', [App\Http\Controllers\Simonik\Extends\Realization\PaperWorkRealizationController::class, 'update'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdminOrDataEntry::class])
        ->name('simonik.realizations.paper-work.update');

        //paper work - target
        Route::get('/simonik/targets/paper-work', [App\Http\Controllers\Simonik\Extends\Target\PaperWorkTargetController::class, 'index'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
        ->name('simonik.targets.paper-work.index');

        Route::put('/simonik/targets/paper-work', [App\Http\Controllers\Simonik\Extends\Target\PaperWorkTargetController::class, 'update'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
        ->name('simonik.targets.paper-work.update');

        //user
        Route::get('/simonik/users', [App\Http\Controllers\Simonik\UserController::class, 'index'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.users.index');

        Route::get('/simonik/users/create', [App\Http\Controllers\Simonik\UserController::class, 'create'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.users.create');

        Route::post('/simonik/users', [App\Http\Controllers\Simonik\UserController::class, 'store'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.users.store');

        Route::get('/simonik/users/{id}/edit', [App\Http\Controllers\Simonik\UserController::class, 'edit'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.users.edit');

        Route::put('/simonik/users/{id}', [App\Http\Controllers\Simonik\UserController::class, 'update'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.users.update');

        Route::get('/simonik/users/{id}/delete', [App\Http\Controllers\Simonik\UserController::class, 'delete'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.users.delete');

        Route::delete('/simonik/users/{id}', [App\Http\Controllers\Simonik\UserController::class, 'destroy'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.users.destroy');

        //level
        Route::get('/simonik/levels', [App\Http\Controllers\Simonik\LevelController::class, 'index'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.levels.index');

        Route::get('/simonik/levels/create', [App\Http\Controllers\Simonik\LevelController::class, 'create'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.levels.create');

        Route::post('/simonik/levels', [App\Http\Controllers\Simonik\LevelController::class, 'store'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.levels.store');

        Route::get('/simonik/levels/{id}/edit', [App\Http\Controllers\Simonik\LevelController::class, 'edit'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.levels.edit');

        Route::put('/simonik/levels/{id}', [App\Http\Controllers\Simonik\LevelController::class, 'update'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.levels.update');

        Route::get('/simonik/levels/{id}/delete', [App\Http\Controllers\Simonik\LevelController::class, 'delete'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.levels.delete');

        Route::delete('/simonik/levels/{id}', [App\Http\Controllers\Simonik\LevelController::class, 'destroy'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.levels.destroy');

        //unit
        Route::get('/simonik/units', [App\Http\Controllers\Simonik\UnitController::class, 'index'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.units.index');

        Route::get('/simonik/units/create', [App\Http\Controllers\Simonik\UnitController::class, 'create'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.units.create');

        Route::post('/simonik/units', [App\Http\Controllers\Simonik\UnitController::class, 'store'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.units.store');

        Route::get('/simonik/units/{id}/edit', [App\Http\Controllers\Simonik\UnitController::class, 'edit'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.units.edit');

        Route::put('/simonik/units/{id}', [App\Http\Controllers\Simonik\UnitController::class, 'update'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.units.update');

        Route::get('/simonik/units/{id}/delete', [App\Http\Controllers\Simonik\UnitController::class, 'delete'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.units.delete');

        Route::delete('/simonik/units/{id}', [App\Http\Controllers\Simonik\UnitController::class, 'destroy'])
        ->middleware([\App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
        ->name('simonik.units.destroy');


        //dashboard
        Route::get('/simonik/dashboard', [App\Http\Controllers\Simonik\DashboardController::class, 'index'])
        ->name('simonik.dashboard');
    });


    //------------------------------------------------------------
    // 4dx
    //------------------------------------------------------------

    Route::middleware([\App\Http\Middleware\FDX\Is__FDX::class])->group(function () {
        //indicator
        Route::get('/fdx/indicators', [App\Http\Controllers\Fdx\IndicatorController::class, 'index'])
        ->name('fdx.indicators.index');

        Route::get('/fdx/indicators/create', [App\Http\Controllers\Fdx\IndicatorController::class, 'create'])
        ->name('fdx.indicators.create');

        Route::post('/fdx/indicators', [App\Http\Controllers\Fdx\IndicatorController::class, 'store'])
        ->name('fdx.indicators.store');

        Route::get('/fdx/indicators/{indicator}/edit', [App\Http\Controllers\Fdx\IndicatorController::class, 'edit'])
        ->name('fdx.indicators.edit');

        Route::put('/fdx/indicators/{indicator}', [App\Http\Controllers\Fdx\IndicatorController::class, 'update'])
        ->name('fdx.indicators.update');

        Route::delete('/fdx/indicators/{indicator}', [App\Http\Controllers\Fdx\IndicatorController::class, 'destroy'])
        ->name('fdx.indicators.destroy');

        //paper work - indicator
        Route::get('/fdx/indicators/paper-work/create', [App\Http\Controllers\Fdx\Extends\Indicator\PaperWorkIndicatorController::class, 'create'])
        ->name('fdx.indicators.paper-work.create');

        Route::post('/fdx/indicators/paper-work', [App\Http\Controllers\Fdx\Extends\Indicator\PaperWorkIndicatorController::class, 'store'])
        ->name('fdx.indicators.paper-work.store');

        Route::get('/fdx/indicators/paper-work/{level}/{unit?}/{tahun?}/edit', [App\Http\Controllers\Fdx\Extends\Indicator\PaperWorkIndicatorController::class, 'edit'])
        ->name('fdx.indicators.paper-work.edit');

        Route::put('/fdx/indicators/paper-work/{level}/{unit?}/{tahun?}', [App\Http\Controllers\Fdx\Extends\Indicator\PaperWorkIndicatorController::class, 'update'])
        ->name('fdx.indicators.paper-work.update');

        Route::delete('/fdx/indicators/paper-work/{level}/{unit?}/{tahun?}', [App\Http\Controllers\Fdx\Extends\Indicator\PaperWorkIndicatorController::class, 'destroy'])
        ->name('fdx.indicators.paper-work.destroy');

        //order
        Route::put('/fdx/indicators/paper-work/{level}/{unit?}/{tahun?}/order', [App\Http\Controllers\Fdx\Extends\Indicator\PaperWorkIndicatorController::class, 'updateOrder'])
        ->name('fdx.indicators.paper-work.order.update');

        //reference - first
        Route::get('/fdx/indicators/paper-work/reference/first/edit', [App\Http\Controllers\Fdx\Extends\Indicator\PaperWorkIndicatorController::class, 'editReferencesFirst'])
        ->name('fdx.indicators.paper-work.reference.first.edit');

        Route::put('/fdx/indicators/paper-work/reference/first', [App\Http\Controllers\Fdx\Extends\Indicator\PaperWorkIndicatorController::class, 'updateReferenceFirst'])
        ->name('fdx.indicators.paper-work.reference.first.update');

        //reference
        Route::get('/fdx/indicators/paper-work/reference/{level}/{unit?}/{tahun?}/edit', [App\Http\Controllers\Fdx\Extends\Indicator\PaperWorkIndicatorController::class, 'editReference'])
        ->name('fdx.indicators.paper-work.reference.edit');

        Route::put('/fdx/indicators/paper-work/reference/{level}/{unit?}/{tahun?}', [App\Http\Controllers\Fdx\Extends\Indicator\PaperWorkIndicatorController::class, 'updateReference'])
        ->name('fdx.indicators.paper-work.reference.update');

        //paper work - realization
        Route::get('/fdx/realizations/paper-work/{level}/{unit}/{tahun}/edit', [App\Http\Controllers\Fdx\Extends\Realization\PaperWorkRealizationController::class, 'edit'])
        ->name('fdx.realizations.paper-work.edit');

        Route::put('/fdx/realizations/paper-work/{level}/{unit}/{tahun}', [App\Http\Controllers\Fdx\Extends\Realization\PaperWorkRealizationController::class, 'update'])
        ->name('fdx.realizations.paper-work.update');

        //paper work - target
        Route::get('/fdx/targets/paper-work/{level}/{unit}/{tahun}/edit', [App\Http\Controllers\Fdx\Extends\Target\PaperWorkTargetController::class, 'edit'])
        ->name('fdx.targets.paper-work.edit');

        Route::put('/fdx/targets/paper-work/{level}/{unit}/{tahun}', [App\Http\Controllers\Fdx\Extends\Target\PaperWorkTargetController::class, 'update'])
        ->name('fdx.targets.paper-work.update');

        //analytic
        Route::get('/fdx/{level?}/{unit?}/{tahun?}/analytic', [App\Http\Controllers\Fdx\AnalyticController::class, 'index'])
        ->name('fdx.analytic');
    });
});
