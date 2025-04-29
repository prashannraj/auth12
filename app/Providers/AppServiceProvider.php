<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CompanyInfo;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Assuming single company record
            $company = CompanyInfo::first();
            View::share('company', $company);
    }
}
