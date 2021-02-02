<?php

namespace Spindogs\LaravelSpinForms;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SpinFormsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Publish config file
        $this->publishes([
            __DIR__ . '/../config/spin-forms.php' => config_path('spin-forms.php')
            ], 'config');

        // Load in the component form views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'spin-forms');

        // Create Blade components
        foreach (config('spin-forms.components') as $k => $v) {
            Blade::component($k, $v['class']);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/spin-forms.php',
            'spin-forms'
        );
    }
}
