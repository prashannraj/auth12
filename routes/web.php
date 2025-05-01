<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Auth\LoginController
use App\Http\Controllers\CompanyInfoController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\EmailSenderController;
use App\Http\Controllers\ServiceFeesController;
use App\Http\Controllers\TemplateController;



Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('company-infos', CompanyInfoController::class);
    Route::get('/company-infos/{id}/delete', [CompanyInfoController::class, 'destroy'])->name('company-infos.destroy');
    Route::get('/company-infos/{id}/edit', [CompanyInfoController::class, 'edit'])->name('company-infos.edit');
    Route::get('/company-infos/create', [CompanyInfoController::class, 'create'])->name('company-infos.create');
    Route::get('/company-infos/{id}', [CompanyInfoController::class, 'show'])->name('company-infos.show');
    Route::get('/company-infos', [CompanyInfoController::class, 'index'])->name('company-infos.index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('advisors', AdvisorController::class);
    Route::get('/advisors/{id}/delete', [AdvisorController::class, 'destroy'])->name('advisors.destroy');
    Route::get('/advisors/{id}/edit', [AdvisorController::class, 'edit'])->name('advisors.edit');
    Route::post('/advisors/{id}/update', [AdvisorController::class, 'update'])->name('advisors.update');
    Route::get('/advisors/create', [AdvisorController::class, 'create'])->name('advisors.create');
    Route::post('/advisors/store', [AdvisorController::class, 'store'])->name('advisors.store');
    Route::get('/advisors/{id}', [AdvisorController::class, 'show'])->name('advisors.show');
    Route::get('/advisors', [AdvisorController::class, 'index'])->name('advisors.index');
});

Route::middleware(['auth'])->group(function () {
    // Resourceful route for CRUD operations
    Route::resource('branches', BranchController::class);

    // Extra routes for non-resource features
    Route::get('/branches-search', [BranchController::class, 'search'])->name('branches.search');
    Route::get('/branches-filter', [BranchController::class, 'filter'])->name('branches.filter');
    Route::get('/branches-sort', [BranchController::class, 'sort'])->name('branches.sort');
    Route::get('/branches-paginate', [BranchController::class, 'paginate'])->name('branches.paginate');
    Route::get('/branches-export', [BranchController::class, 'export'])->name('branches.export');
    Route::post('/branches-import', [BranchController::class, 'import'])->name('branches.import');
    Route::get('/branches-report', [BranchController::class, 'generateReport'])->name('branches.report');
    Route::get('/branches/{id}/confirm-delete', [BranchController::class, 'confirmDelete'])->name('branches.confirmDelete');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('email-senders', EmailSenderController::class);
    Route::get('/email-senders/{id}/delete', [EmailSenderController::class, 'destroy'])->name('email-senders.destroy');
    Route::get('/email-senders/{id}/edit', [EmailSenderController::class, 'edit'])->name('email-senders.edit');
    Route::post('/email-senders/{id}/update', [EmailSenderController::class, 'update'])->name('email-senders.update');
    Route::get('/email-senders/create', [EmailSenderController::class, 'create'])->name('email-senders.create');
    Route::post('/email-senders/store', [EmailSenderController::class, 'store'])->name('email-senders.store');
    Route::get('/email-senders/{id}', [EmailSenderController::class, 'show'])->name('email-senders.show');
    Route::get('/email-senders', [EmailSenderController::class, 'index'])->name('email-senders.index');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('service-fees', ServiceFeesController::class);
    Route::get('/service-fees/{id}/delete', [ServiceFeesController::class, 'destroy'])->name('service-fees.destroy');
    Route::get('/service-fees/{id}/edit', [ServiceFeesController::class, 'edit'])->name('service-fees.edit');
    Route::post('/service-fees/{id}/update', [ServiceFeesController::class, 'update'])->name('service-fees.update');
    Route::get('/service-fees/create', [ServiceFeesController::class, 'create'])->name('service-fees.create');
    Route::post('/service-fees/store', [ServiceFeesController::class, 'store'])->name('service-fees.store');
    Route::get('/service-fees/{id}', [ServiceFeesController::class, 'show'])->name('service-fees.show');
    Route::get('/service-fees', [ServiceFeesController::class, 'index'])->name('service-fees.index');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('templates', TemplateController::class);
    Route::get('/templates/{id}/delete', [TemplateController::class, 'destroy'])->name('templates.destroy');
    Route::get('/templates/{id}/edit', [TemplateController::class, 'edit'])->name('templates.edit');
    Route::post('/templates/{id}/update', [TemplateController::class, 'update'])->name('templates.update');
    Route::get('/templates/create', [TemplateController::class, 'create'])->name('templates.create');
    Route::post('/templates/store', [TemplateController::class, 'store'])->name('templates.store');
    Route::get('/templates/{id}', [TemplateController::class, 'show'])->name('templates.show');
    Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
});
    



require __DIR__.'/auth.php';
