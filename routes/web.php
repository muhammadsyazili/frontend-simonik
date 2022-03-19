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
    return redirect()->route('simonik.dashboard.before');
});

//Login - Form
Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginForm'])
    ->name('login.form');

//Login
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])
    ->name('login');

Route::get('/dashboard', [App\Http\Controllers\Simonik\DashboardController::class, 'dashboard_before_login'])
    ->name('simonik.dashboard.before');

//Logout
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout');

Route::middleware([App\Http\Middleware\IsLogin::class])->group(function () {

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

            return $response->object()->data->user->actived ? redirect()->route('simonik.monitoring') : redirect()->route('simonik.user.password.change.form', ['id' => $id]);
        } else if ($request->cookie('X-App') === 'fdx') {
            return 'FDX page';
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

        Route::post('/simonik/realizations/paper-work/{level}/{unit}/{tahun}/import', [App\Http\Controllers\Simonik\Extends\Realization\PaperWorkRealizationController::class, 'import'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.realizations.paper-work.import');

        Route::get('/simonik/realizations/paper-work/{level}/{unit}/{tahun}/export', [App\Http\Controllers\Simonik\Extends\Realization\PaperWorkRealizationController::class, 'export'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.realizations.paper-work.export');

        //paper work - target
        Route::get('/simonik/targets/paper-work', [App\Http\Controllers\Simonik\Extends\Target\PaperWorkTargetController::class, 'index'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.targets.paper-work.index');

        Route::put('/simonik/targets/paper-work', [App\Http\Controllers\Simonik\Extends\Target\PaperWorkTargetController::class, 'update'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.targets.paper-work.update');

        Route::post('/simonik/targets/paper-work/{level}/{unit}/{tahun}/import', [App\Http\Controllers\Simonik\Extends\Target\PaperWorkTargetController::class, 'import'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.targets.paper-work.import');

        Route::get('/simonik/targets/paper-work/{level}/{unit}/{tahun}/export', [App\Http\Controllers\Simonik\Extends\Target\PaperWorkTargetController::class, 'export'])
            ->middleware([\App\Http\Middleware\SIMONIK\IsActive::class, \App\Http\Middleware\SIMONIK\IsSuperAdminOrAdmin::class])
            ->name('simonik.targets.paper-work.export');

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

        //monitoring
        Route::get('/simonik/monitoring', [App\Http\Controllers\Simonik\MonitoringController::class, 'monitoring'])
            ->name('simonik.monitoring');

        Route::get('/simonik/monitoring/{level}/{unit}/{tahun}/{bulan}/export', [App\Http\Controllers\Simonik\MonitoringController::class, 'export'])
            ->name('simonik.monitoring.export');

        //rangking
        Route::get('/simonik/rangking', [App\Http\Controllers\Simonik\RangkingController::class, 'rangking'])
            ->name('simonik.rangking');

        //comparing
        Route::get('/simonik/comparing', [App\Http\Controllers\Simonik\ComparingController::class, 'comparing'])
            ->name('simonik.comparing');

        //export
        Route::get('/simonik/export/index', [App\Http\Controllers\Simonik\ExportController::class, 'index'])
            ->name('simonik.export.index');

        Route::get('/simonik/export/{level}/{unit}/{tahun}', [App\Http\Controllers\Simonik\ExportController::class, 'export'])
            ->name('simonik.export');
    });
});
