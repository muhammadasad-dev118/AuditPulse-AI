<?php
use App\Models\AuditResult;
use App\Http\Controllers\Auth\RegisterTenantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [RegisterTenantController::class, 'show'])->name('register.tenant');
Route::get('/report/{auditResult}', function (AuditResult $auditResult) {
    return view('public-report', ['report' => $auditResult]);
})->name('public.report.show');
Route::post('/register', [RegisterTenantController::class, 'store'])->name('register.tenant.store');