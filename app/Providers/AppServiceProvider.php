<?php

    namespace App\Providers;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\URL;
    use Illuminate\Support\Facades\Vite;
    use Illuminate\Support\ServiceProvider;

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
            $this->configureCommands();
            $this->configureModels();
            $this->configureUrl();
            $this->configureVite();
        }

        /**
         * Configures the database commands to prohibit destructive
         * operations in a production environment.
         */
        private function configureCommands(): void
        {
            DB::prohibitDestructiveCommands(
                $this->app->isProduction(),
            );
        }

        /**
         * Configures the behavior of Eloquent models by enabling strict mode
         * and unguarding attributes to allow mass assignment.
         */
        private function configureModels(): void
        {
            Model::shouldBeStrict();
        }

        /**
         * Configures the URL generator to enforce the usage of a specific scheme.
         * In this case, it enforces HTTPS for all generated URLs.
         */
        private function configureUrl(): void
        {
            URL::forceScheme('https');
        }

        /**
         * Configures the Vite prefetch strategy to improve asset loading.
         */
        private function configureVite(): void
        {
            Vite::useAggressivePrefetching();
        }
    }
