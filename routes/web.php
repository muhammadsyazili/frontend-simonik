<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

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
    Route::get('/home', function (Request $request) {
        if ($request->cookie('X-App') === 'simonik') {
            $id = $request->cookie('X-User-Id');

            $response = SIMONIK_sevices("/user/$id/active/check", 'get', []);

            if ($response->clientError()) {
                return redirect()->route('logout')->withErrors($response->object()->errors);
            }

            if ($response->serverError()) {
                Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
                return redirect()->route('logout');
            }

            return $response->object()->data->user->actived ? redirect()->route('simonik.indicators.paper-work.index') : redirect()->route('simonik.user.password.change.form', ['id' => $id]);
            //return $request->cookie('X-Active') ? redirect()->route('simonik.indicators.paper-work.index') : redirect()->route('simonik.user.password.change.form', ['id' => $id]);
        } else if ($request->cookie('X-App') === 'fdx') {
            return redirect()->route('fdx.indicators.index');
        } else {
            return redirect()->route('logout');
        }
    })->name('home');

    //------------------------------------------------------------
    // SIMONIK
    //------------------------------------------------------------

    Route::middleware([\App\Http\Middleware\SIMONIK\Is__SIMONIK::class])->group(function () {
        //change password
        Route::get('/simonik/user/{id}/password/change', [App\Http\Controllers\Simonik\UserController::class, 'password_change_form'])
            ->name('simonik.user.password.change.form');

        Route::put('/simonik/user/{id}/password/change', [App\Http\Controllers\Simonik\UserController::class, 'password_change'])
            ->name('simonik.user.password.change');

        //indicator
        Route::get('/simonik/indicators/create', [App\Http\Controllers\Simonik\IndicatorController::class, 'create'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.indicators.create');

        Route::post('/simonik/indicators', [App\Http\Controllers\Simonik\IndicatorController::class, 'store'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.indicators.store');

        Route::get('/simonik/indicators/{id}/edit', [App\Http\Controllers\Simonik\IndicatorController::class, 'edit'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.indicators.edit');

        Route::put('/simonik/indicators/{id}', [App\Http\Controllers\Simonik\IndicatorController::class, 'update'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.indicators.update');

        Route::get('/simonik/indicators/{id}/{name}/delete', [App\Http\Controllers\Simonik\IndicatorController::class, 'delete'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.indicators.delete');

        Route::delete('/simonik/indicators/{id}', [App\Http\Controllers\Simonik\IndicatorController::class, 'destroy'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.indicators.destroy');

        //paper work - indicator
        Route::get('/simonik/indicators/paper-work', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'index'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class])
            ->name('simonik.indicators.paper-work.index');

        Route::get('/simonik/indicators/paper-work/create', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'create'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.indicators.paper-work.create');

        Route::post('/simonik/indicators/paper-work', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'store'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.indicators.paper-work.store');

        Route::get('/simonik/indicators/paper-work/{level}/{unit}/{tahun}/edit', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'edit'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.indicators.paper-work.edit');

        Route::put('/simonik/indicators/paper-work/{level}/{unit}/{tahun}', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'update'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.indicators.paper-work.update');

        Route::get('/simonik/indicators/paper-work/{level}/{unit}/{tahun}/delete', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'delete'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.indicators.paper-work.delete');

        Route::delete('/simonik/indicators/paper-work/{level}/{unit}/{tahun}', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'destroy'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.indicators.paper-work.destroy');

        //reorder
        Route::put('/simonik/indicators/paper-work/reorder', [App\Http\Controllers\Simonik\Extends\Indicator\PaperWorkIndicatorController::class, 'reorder'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.indicators.paper-work.reorder');

        //reference
        Route::get('/simonik/indicators/paper-work/reference/create', [App\Http\Controllers\Simonik\Extends\Indicator\IndicatorReferenceController::class, 'create'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.indicators.paper-work.reference.create');

        Route::post('/simonik/indicators/paper-work/reference', [App\Http\Controllers\Simonik\Extends\Indicator\IndicatorReferenceController::class, 'store'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.indicators.paper-work.reference.store');

        Route::get('/simonik/indicators/paper-work/reference/edit', [App\Http\Controllers\Simonik\Extends\Indicator\IndicatorReferenceController::class, 'edit'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.indicators.paper-work.reference.edit');

        Route::put('/simonik/indicators/paper-work/reference/update', [App\Http\Controllers\Simonik\Extends\Indicator\IndicatorReferenceController::class, 'update'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.indicators.paper-work.reference.update');

        //paper work - realization
        Route::get('/simonik/realizations/paper-work', [App\Http\Controllers\Simonik\Extends\Realization\PaperWorkRealizationController::class, 'index'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdminOrDataEntry::class])
            ->name('simonik.realizations.paper-work.index');

        Route::put('/simonik/realizations/paper-work', [App\Http\Controllers\Simonik\Extends\Realization\PaperWorkRealizationController::class, 'update'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdminOrDataEntry::class])
            ->name('simonik.realizations.paper-work.update');

        //paper work - target
        Route::get('/simonik/targets/paper-work', [App\Http\Controllers\Simonik\Extends\Target\PaperWorkTargetController::class, 'index'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.targets.paper-work.index');

        Route::put('/simonik/targets/paper-work', [App\Http\Controllers\Simonik\Extends\Target\PaperWorkTargetController::class, 'update'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.targets.paper-work.update');

        //user
        Route::get('/simonik/users', [App\Http\Controllers\Simonik\UserController::class, 'index'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.user.index');

        Route::get('/simonik/user/create', [App\Http\Controllers\Simonik\UserController::class, 'create'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.user.create');

        Route::post('/simonik/user', [App\Http\Controllers\Simonik\UserController::class, 'store'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.user.store');

        Route::get('/simonik/user/{id}/edit', [App\Http\Controllers\Simonik\UserController::class, 'edit'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.user.edit');

        Route::put('/simonik/user/{id}', [App\Http\Controllers\Simonik\UserController::class, 'update'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.user.update');

        Route::get('/simonik/user/{id}/{username}/delete', [App\Http\Controllers\Simonik\UserController::class, 'delete'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.user.delete');

        Route::delete('/simonik/user/{id}', [App\Http\Controllers\Simonik\UserController::class, 'destroy'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.user.destroy');

        Route::get('/simonik/user/{id}/{username}/password/reset', [App\Http\Controllers\Simonik\UserController::class, 'password_reset_form'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.user.password.reset.form');

        Route::put('/simonik/user/{id}/password/reset', [App\Http\Controllers\Simonik\UserController::class, 'password_reset'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.user.password.reset');

        //level
        Route::get('/simonik/levels', [App\Http\Controllers\Simonik\LevelController::class, 'index'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.level.index');

        Route::get('/simonik/level/create', [App\Http\Controllers\Simonik\LevelController::class, 'create'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.level.create');

        Route::post('/simonik/level', [App\Http\Controllers\Simonik\LevelController::class, 'store'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.level.store');

        Route::get('/simonik/level/{id}/edit', [App\Http\Controllers\Simonik\LevelController::class, 'edit'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.level.edit');

        Route::put('/simonik/level/{id}', [App\Http\Controllers\Simonik\LevelController::class, 'update'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.level.update');

        Route::get('/simonik/level/{id}/{name}/delete', [App\Http\Controllers\Simonik\LevelController::class, 'delete'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.level.delete');

        Route::delete('/simonik/level/{id}', [App\Http\Controllers\Simonik\LevelController::class, 'destroy'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.level.destroy');

        //unit
        Route::get('/simonik/units', [App\Http\Controllers\Simonik\UnitController::class, 'index'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.unit.index');

        Route::get('/simonik/unit/create', [App\Http\Controllers\Simonik\UnitController::class, 'create'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.unit.create');

        Route::post('/simonik/unit', [App\Http\Controllers\Simonik\UnitController::class, 'store'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.unit.store');

        Route::get('/simonik/unit/{id}/edit', [App\Http\Controllers\Simonik\UnitController::class, 'edit'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.unit.edit');

        Route::put('/simonik/unit/{id}', [App\Http\Controllers\Simonik\UnitController::class, 'update'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.unit.update');

        Route::get('/simonik/unit/{id}/{name}/delete', [App\Http\Controllers\Simonik\UnitController::class, 'delete'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.unit.delete');

        Route::delete('/simonik/unit/{id}', [App\Http\Controllers\Simonik\UnitController::class, 'destroy'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdmin::class])
            ->name('simonik.unit.destroy');


        //analytic
        Route::get('/simonik/analytic', [App\Http\Controllers\Simonik\AnalyticController::class, 'index'])
            ->name('simonik.analytic');

        //export
        Route::get('/simonik/export', [App\Http\Controllers\Simonik\ExportController::class, 'index'])
            ->name('simonik.export');
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
