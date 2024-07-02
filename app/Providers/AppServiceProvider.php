<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('error', function ($field) {
            return "<?php if (\$errors->has($field)): ?>
                        <div class=\"invalid-feedback\">
                            <?php echo e(\$errors->first($field)); ?>
                        </div>
                    <?php endif; ?>";
        });

        Blade::directive('sessionMessages', function () {
            return "<?php if(session('status')): ?>
                        <div class='status-message'>
                            <?php echo e(session('status')); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                        <div class='invalid-feedback'>
                            <?php echo e(session('error')); ?>
                        </div>
                    <?php endif; ?>";
        });
    }
}
