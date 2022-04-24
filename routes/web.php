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
    return redirect()->route('semongko.dashboard');
});

//Login - Form
Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginForm'])
    ->name('login.form');

//Login
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])
    ->name('login');

Route::get('/dashboard', [App\Http\Controllers\Semongko\DashboardController::class, 'dashboard'])
    ->name('semongko.dashboard');

//Logout
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout');

//setting host
Route::get('/semongko/host/edit', [App\Http\Controllers\Semongko\SemongkoBackendHostController::class, 'edit'])
    ->name('semongko.host.edit');

Route::put('/semongko/setting/host', [App\Http\Controllers\Semongko\SemongkoBackendHostController::class, 'update'])
    ->name('semongko.host.update');

Route::middleware([App\Http\Middleware\IsLogin::class])->group(function () {

    //Home
    Route::get('/home', function (Request $request) {
        if ($request->cookie('X-App') === 'semongko') {
            $id = $request->cookie('X-User-Id');

            $response = SEMONGKO_services("/user/$id/active/check", 'get', []);

            if ($response->clientError()) {

                return redirect()->route('logout')->withErrors($response->object()->errors);
            }

            if ($response->serverError()) {
                //logging
                $output = new \Symfony\Component\Console\Output\ConsoleOutput();
                $output->writeln('clientError');

                Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
                return redirect()->route('logout');
            }

            return $response->object()->data->user->actived ? redirect()->route('semongko.monitoring') : redirect()->route('semongko.user.password.change.form', ['id' => $id]);
        } else if ($request->cookie('X-App') === 'fdx') {
            return 'FDX page';
        } else {
            return redirect()->route('logout');
        }
    })->name('home');

    //------------------------------------------------------------
    // SEMONGKO
    //------------------------------------------------------------

    Route::middleware([\App\Http\Middleware\SEMONGKO\Is__SEMONGKO::class])->group(function () {
        //change password
        Route::get('/semongko/user/{id}/password/change', [App\Http\Controllers\Semongko\UserController::class, 'password_change_form'])
            ->name('semongko.user.password.change.form');

        Route::put('/semongko/user/{id}/password/change', [App\Http\Controllers\Semongko\UserController::class, 'password_change'])
            ->name('semongko.user.password.change');

        //paper work - indicator
        Route::get('/semongko/indicators/paper-work', [App\Http\Controllers\Semongko\Extends\Indicator\PaperWorkIndicatorController::class, 'index'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class])
            ->name('semongko.indicators.paper-work.index');

        Route::get('/semongko/indicators/paper-work/create', [App\Http\Controllers\Semongko\Extends\Indicator\PaperWorkIndicatorController::class, 'create'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.indicators.paper-work.create');

        Route::post('/semongko/indicators/paper-work', [App\Http\Controllers\Semongko\Extends\Indicator\PaperWorkIndicatorController::class, 'store'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.indicators.paper-work.store');

        Route::get('/semongko/indicators/paper-work/{level}/{unit}/{tahun}/edit', [App\Http\Controllers\Semongko\Extends\Indicator\PaperWorkIndicatorController::class, 'edit'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.indicators.paper-work.edit');

        Route::put('/semongko/indicators/paper-work/{level}/{unit}/{tahun}', [App\Http\Controllers\Semongko\Extends\Indicator\PaperWorkIndicatorController::class, 'update'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.indicators.paper-work.update');

        Route::get('/semongko/indicators/paper-work/{level}/{unit}/{tahun}/delete', [App\Http\Controllers\Semongko\Extends\Indicator\PaperWorkIndicatorController::class, 'delete'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.indicators.paper-work.delete');

        Route::delete('/semongko/indicators/paper-work/{level}/{unit}/{tahun}', [App\Http\Controllers\Semongko\Extends\Indicator\PaperWorkIndicatorController::class, 'destroy'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.indicators.paper-work.destroy');

        Route::put('/semongko/indicators/paper-work/reorder', [App\Http\Controllers\Semongko\Extends\Indicator\PaperWorkIndicatorController::class, 'reorder'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.indicators.paper-work.reorder');

        //reference
        Route::get('/semongko/indicators/paper-work/reference/create', [App\Http\Controllers\Semongko\Extends\Indicator\IndicatorReferenceController::class, 'create'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.indicators.paper-work.reference.create');

        Route::post('/semongko/indicators/paper-work/reference', [App\Http\Controllers\Semongko\Extends\Indicator\IndicatorReferenceController::class, 'store'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.indicators.paper-work.reference.store');

        Route::get('/semongko/indicators/paper-work/reference/edit', [App\Http\Controllers\Semongko\Extends\Indicator\IndicatorReferenceController::class, 'edit'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.indicators.paper-work.reference.edit');

        Route::put('/semongko/indicators/paper-work/reference/update', [App\Http\Controllers\Semongko\Extends\Indicator\IndicatorReferenceController::class, 'update'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.indicators.paper-work.reference.update');

        //paper work - realization
        Route::get('/semongko/realizations/paper-work', [App\Http\Controllers\Semongko\Extends\Realization\PaperWorkRealizationController::class, 'index'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdminOrDataEntry::class])
            ->name('semongko.realizations.paper-work.index');

        Route::put('/semongko/realizations/paper-work', [App\Http\Controllers\Semongko\Extends\Realization\PaperWorkRealizationController::class, 'update'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdminOrDataEntry::class])
            ->name('semongko.realizations.paper-work.update');

        Route::post('/semongko/realizations/paper-work/{level}/{unit}/{tahun}/import', [App\Http\Controllers\Semongko\Extends\Realization\PaperWorkRealizationController::class, 'import'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.realizations.paper-work.import');

        Route::get('/semongko/realizations/paper-work/{level}/{unit}/{tahun}/export', [App\Http\Controllers\Semongko\Extends\Realization\PaperWorkRealizationController::class, 'export'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.realizations.paper-work.export');

        //paper work - target
        Route::get('/semongko/targets/paper-work', [App\Http\Controllers\Semongko\Extends\Target\PaperWorkTargetController::class, 'index'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.targets.paper-work.index');

        Route::put('/semongko/targets/paper-work', [App\Http\Controllers\Semongko\Extends\Target\PaperWorkTargetController::class, 'update'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.targets.paper-work.update');

        Route::post('/semongko/targets/paper-work/{level}/{unit}/{tahun}/import', [App\Http\Controllers\Semongko\Extends\Target\PaperWorkTargetController::class, 'import'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.targets.paper-work.import');

        Route::get('/semongko/targets/paper-work/{level}/{unit}/{tahun}/export', [App\Http\Controllers\Semongko\Extends\Target\PaperWorkTargetController::class, 'export'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.targets.paper-work.export');

        //indicator
        Route::get('/semongko/indicators/create', [App\Http\Controllers\Semongko\IndicatorController::class, 'create'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.indicators.create');

        Route::post('/semongko/indicators', [App\Http\Controllers\Semongko\IndicatorController::class, 'store'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.indicators.store');

        Route::get('/semongko/indicators/{id}/edit', [App\Http\Controllers\Semongko\IndicatorController::class, 'edit'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.indicators.edit');

        Route::put('/semongko/indicators/{id}', [App\Http\Controllers\Semongko\IndicatorController::class, 'update'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdminOrAdmin::class])
            ->name('semongko.indicators.update');

        Route::get('/semongko/indicators/{id}/{name}/delete', [App\Http\Controllers\Semongko\IndicatorController::class, 'delete'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.indicators.delete');

        Route::delete('/semongko/indicators/{id}', [App\Http\Controllers\Semongko\IndicatorController::class, 'destroy'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.indicators.destroy');

        //user
        Route::get('/semongko/users', [App\Http\Controllers\Semongko\UserController::class, 'index'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.user.index');

        Route::get('/semongko/user/create', [App\Http\Controllers\Semongko\UserController::class, 'create'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.user.create');

        Route::post('/semongko/user', [App\Http\Controllers\Semongko\UserController::class, 'store'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.user.store');

        Route::get('/semongko/user/{id}/edit', [App\Http\Controllers\Semongko\UserController::class, 'edit'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.user.edit');

        Route::put('/semongko/user/{id}', [App\Http\Controllers\Semongko\UserController::class, 'update'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.user.update');

        Route::get('/semongko/user/{id}/{username}/delete', [App\Http\Controllers\Semongko\UserController::class, 'delete'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.user.delete');

        Route::delete('/semongko/user/{id}', [App\Http\Controllers\Semongko\UserController::class, 'destroy'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.user.destroy');

        Route::get('/semongko/user/{id}/{username}/password/reset', [App\Http\Controllers\Semongko\UserController::class, 'password_reset_form'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.user.password.reset.form');

        Route::put('/semongko/user/{id}/password/reset', [App\Http\Controllers\Semongko\UserController::class, 'password_reset'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.user.password.reset');

        //level
        Route::get('/semongko/levels', [App\Http\Controllers\Semongko\LevelController::class, 'index'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.level.index');

        Route::get('/semongko/level/create', [App\Http\Controllers\Semongko\LevelController::class, 'create'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.level.create');

        Route::post('/semongko/level', [App\Http\Controllers\Semongko\LevelController::class, 'store'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.level.store');

        Route::get('/semongko/level/{id}/edit', [App\Http\Controllers\Semongko\LevelController::class, 'edit'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.level.edit');

        Route::put('/semongko/level/{id}', [App\Http\Controllers\Semongko\LevelController::class, 'update'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.level.update');

        Route::get('/semongko/level/{id}/{name}/delete', [App\Http\Controllers\Semongko\LevelController::class, 'delete'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.level.delete');

        Route::delete('/semongko/level/{id}', [App\Http\Controllers\Semongko\LevelController::class, 'destroy'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.level.destroy');

        //unit
        Route::get('/semongko/units', [App\Http\Controllers\Semongko\UnitController::class, 'index'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.unit.index');

        Route::get('/semongko/unit/create', [App\Http\Controllers\Semongko\UnitController::class, 'create'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.unit.create');

        Route::post('/semongko/unit', [App\Http\Controllers\Semongko\UnitController::class, 'store'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.unit.store');

        Route::get('/semongko/unit/{id}/edit', [App\Http\Controllers\Semongko\UnitController::class, 'edit'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.unit.edit');

        Route::put('/semongko/unit/{id}', [App\Http\Controllers\Semongko\UnitController::class, 'update'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.unit.update');

        Route::get('/semongko/unit/{id}/{name}/delete', [App\Http\Controllers\Semongko\UnitController::class, 'delete'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.unit.delete');

        Route::delete('/semongko/unit/{id}', [App\Http\Controllers\Semongko\UnitController::class, 'destroy'])
            ->middleware([\App\Http\Middleware\SEMONGKO\IsActive::class, \App\Http\Middleware\SEMONGKO\IsSuperAdmin::class])
            ->name('semongko.unit.destroy');

        //monitoring
        Route::get('/semongko/monitoring', [App\Http\Controllers\Semongko\MonitoringController::class, 'monitoring'])
            ->name('semongko.monitoring');

        //rangking
        Route::get('/semongko/rangking', [App\Http\Controllers\Semongko\RangkingController::class, 'rangking'])
            ->name('semongko.rangking');

        //comparing
        Route::get('/semongko/comparing', [App\Http\Controllers\Semongko\ComparingController::class, 'comparing'])
            ->name('semongko.comparing');

        //exporting
        Route::get('/semongko/exporting/{level}/{unit}/{tahun}/{bulan}', [App\Http\Controllers\Semongko\MonitoringController::class, 'exporting'])
            ->name('semongko.exporting');
    });
});
