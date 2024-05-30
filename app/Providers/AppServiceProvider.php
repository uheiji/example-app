<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cloudinary\Cloudinary;
use App\Modules\ImageUpload\CloudinaryImageManager;
use App\Modules\ImageUpload\ImageManagerInterface;
use App\Modules\ImageUpload\LocalImageManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(Cloudinary::class, function () {
            $config = config('cloudinary');

            if (empty($config['cloud_name']) || empty($config['api_key']) || empty($config['api_secret'])) {
                throw new \Exception('Cloudinary configuration is missing');
            }

            return new Cloudinary([
                'cloud' => [
                    'cloud_name' => $config['cloud_name'],
                    'api_key' => $config['api_key'],
                    'api_secret' => $config['api_secret']
                ]
            ]);
        });

        if ($this->app->environment('production')) {
            $this->app->bind(ImageManagerInterface::class, CloudinaryImageManager::class);
        } else {
            $this->app->bind(ImageManagerInterface::class, LocalImageManager::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        require_once app_path('helpers.php');
    }
}
