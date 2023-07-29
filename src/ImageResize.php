<?php
namespace RaselSwe\ImageResize;

use Intervention\Image\ImageManagerStatic as Image;

class ImageResize{

    public function resize( $file, $width, $height, $extension= 'auto', $status = 'auto-adjust')
    {

        $fileName = "{$width}x{$height}-".time();
        $mainFileName = 'main-image-'.time();
        if($extension === 'auto'){
            $fileName .= '.'.$file->getClientOriginalExtension();
            $mainFileName .= '.'.$file->getClientOriginalExtension();
        }else{
            $fileName .= '.'.$extension;
            $mainFileName .= '.'.$extension;
        }

        $destinationPath = public_path('/image-resizer/images/');

        $imgFile = Image::make($file->getRealPath());
        if($status === 'auto-adjust'){
            $imgFile->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.$fileName);
        }else{
            $imgFile->resize($width, $height, function ($constraint) {
            })->save($destinationPath.$fileName);
        }
        $file->move($destinationPath, $mainFileName);

        $main_image_path = '/image-resizer/images/'.$mainFileName;
        $resize_image_path = '/image-resizer/images/'.$fileName;

        return ['main_image_path' => $main_image_path, 'resize_image_path' => $resize_image_path];


    }
}
