<?php

namespace App\Providers;

use App\Jobs\ProductCreated;
use App\Jobs\ProductDeleted;
use App\Jobs\ProductUpdated;
use App\Jobs\TestJob; // Import the TestJob class
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // \App::bindMethod(TestJob::class, '@handle');
        \App::bindMethod(ProductCreated::class, '@handle');
        \App::bindMethod(ProductUpdated::class, '@handle');
        \App::bindMethod(ProductDeleted::class, '@handle');
    }
}
