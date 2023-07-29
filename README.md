# RaselSwe Image Resizer


RaselSwe Image Resizer is a Laravel package that makes it easy to resize any image to any dimention and extention.


- Developer can integrate this package and resize image in right way.
- Resize image fixed size or flexible size


## Installing RaselSwe Image Resizer

The recommended way to install image resizer

```bash
composer require raselswe/image-resizer
```


## Setup Pakage

```bash
php artisan vendor:publish --provider="RaselSwe\ImageResize\ImageServiceProvider"
```
You will get image-resizer directory inside public directory


## Example Code

```php


// TEST IMAGE RESIZER -- EXAMPLE CODE -- web.php

Route::get('image/upload', [ImageUploadController::class, 'index']);
Route::post('image/upload', [ImageUploadController::class, 'upload']);


// ImageUploadController.php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RaselSwe\ImageResize\ImageResize;

class ImageUploadController extends Controller
{
    public function index()
    {
        return view('image');
    }

    public function upload(Request $request, ImageResize $resize)
    {

        $item = $resize->resize($request->file, 150, 150);
        dd($item);
        // GET ARRAY
        // FIND ORIGINAL IMAGE AND RESIZED IMAGE LINK
        // MAKE DB TRANSECTION HERE

    }
}
?>
```



// VIEW FILE resources/views/image.blade.php

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RaselSwe Image Resizer</title>
</head>
<body>

    <form action="{{ url('image/upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept="image/*" />
        <input type="submit" value="upload">
    </form>

</body>
</html>
```
## License

LaravelBkash is made available under the MIT License (MIT).
