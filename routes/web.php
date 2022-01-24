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

Route::middleware([App\Http\Middleware\LoginCheck::class])->group(function () {

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

    Route::middleware(\App\Http\Middleware\ValidSIMONIK::class)->group(function () {
        //indicator
        Route::get('/simonik/indicators', [App\Http\Controllers\Simonik\IndicatorController::class, 'index'])
        ->name('simonik.indicators.index');

        Route::get('/simonik/indicators/create', [App\Http\Controllers\Simonik\IndicatorController::class, 'create'])
        ->name('simonik.indicators.create')
        ->middleware(\App\Http\Middleware\SuperAdminRoleCheck::class);

        Route::post('/simonik/indicators', [App\Http\Controllers\Simonik\IndicatorController::class, 'store'])
        ->name('simonik.indicators.store')
        ->middleware(\App\Http\Middleware\SuperAdminRoleCheck::class);

        Route::get('/simonik/indicators/{id}/edit', [App\Http\Controllers\Simonik\IndicatorController::class, 'edit'])
        ->name('simonik.indicators.edit');

        Route::put('/simonik/indicators/{id}', [App\Http\Controllers\Simonik\IndicatorController::class, 'update'])
        ->name('simonik.indicators.update');

        Route::get('/simonik/indicators/{id}/delete', [App\Http\Controllers\Simonik\IndicatorController::class, 'delete'])
        ->name('simonik.indicators.delete');

        Route::delete('/simonik/indicators/{id}', [App\Http\Controllers\Simonik\IndicatorController::class, 'destroy'])
        ->name('simonik.indicators.destroy');

        //paper work - indicator
        Route::get('/simonik/indicators/paper-work', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'index'])
        ->name('simonik.indicators.paper-work.index');

        Route::get('/simonik/indicators/paper-work/create', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'create'])
        ->name('simonik.indicators.paper-work.create');

        Route::post('/simonik/indicators/paper-work', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'store'])
        ->name('simonik.indicators.paper-work.store');

        Route::get('/simonik/indicators/paper-work/{level}/{unit}/{tahun}/edit', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'edit'])
        ->name('simonik.indicators.paper-work.edit');

        Route::put('/simonik/indicators/paper-work/{level}/{unit}/{tahun}', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'update'])
        ->name('simonik.indicators.paper-work.update');

        Route::get('/simonik/indicators/paper-work/{level}/{unit}/{tahun}/delete', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'delete'])
        ->name('simonik.indicators.paper-work.delete');

        Route::delete('/simonik/indicators/paper-work/{level}/{unit}/{tahun}', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'destroy'])
        ->name('simonik.indicators.paper-work.destroy');

        //reorder
        Route::put('/simonik/indicators/paper-work/reorder', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'reorder'])
        ->name('simonik.indicators.paper-work.reorder');

        //reference
        Route::get('/simonik/indicators/paper-work/reference/create', [App\Http\Controllers\Simonik\Extends\Indicator\IndicatorReferenceController::class, 'create'])
        ->name('simonik.indicators.paper-work.reference.create')
        ->middleware(\App\Http\Middleware\SuperAdminRoleCheck::class);

        Route::post('/simonik/indicators/paper-work/reference', [App\Http\Controllers\Simonik\Extends\Indicator\IndicatorReferenceController::class, 'store'])
        ->name('simonik.indicators.paper-work.reference.store')
        ->middleware(\App\Http\Middleware\SuperAdminRoleCheck::class);

        Route::get('/simonik/indicators/paper-work/reference/edit', [App\Http\Controllers\Simonik\Extends\Indicator\IndicatorReferenceController::class, 'edit'])
        ->name('simonik.indicators.paper-work.reference.edit')
        ->middleware(\App\Http\Middleware\AdminRoleCheck::class);

        Route::put('/simonik/indicators/paper-work/reference/update', [App\Http\Controllers\Simonik\Extends\Indicator\IndicatorReferenceController::class, 'update'])
        ->name('simonik.indicators.paper-work.reference.update')
        ->middleware(\App\Http\Middleware\AdminRoleCheck::class);

        //paper work - realization
        Route::get('/simonik/realizations/paper-work', [App\Http\Controllers\Simonik\Extends\Realization\PaperWorkRealizationController::class, 'index'])
        ->name('simonik.realizations.paper-work.index');

        Route::get('/simonik/realizations/paper-work/{level}/{unit}/{tahun}/edit', [App\Http\Controllers\Simonik\Extends\Realization\PaperWorkRealizationController::class, 'edit'])
        ->name('simonik.realizations.paper-work.edit');

        Route::put('/simonik/realizations/paper-work/{level}/{unit}/{tahun}', [App\Http\Controllers\Simonik\Extends\Realization\PaperWorkRealizationController::class, 'update'])
        ->name('simonik.realizations.paper-work.update');

        //paper work - target
        Route::get('/simonik/targets/paper-work', [App\Http\Controllers\Simonik\Extends\Target\PaperWorkTargetController::class, 'index'])
        ->name('simonik.targets.paper-work.index');

        Route::put('/simonik/targets/paper-work', [App\Http\Controllers\Simonik\Extends\Target\PaperWorkTargetController::class, 'update'])
        ->name('simonik.targets.paper-work.update');

        //dashboard
        Route::get('/simonik/dashboard', [App\Http\Controllers\Simonik\DashboardController::class, 'index'])
        ->name('simonik.dashboard');
    });


    //------------------------------------------------------------
    // 4dx
    //------------------------------------------------------------

    Route::middleware(\App\Http\Middleware\ValidFDX::class)->group(function () {
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
