<?php
namespace RaselSwe\ImageResize;

use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->publishes([
            __DIR__.'/public' => public_path('image-resizer/images/'),
        ], 'public');
    }

    public function register()
    {

    }
}
