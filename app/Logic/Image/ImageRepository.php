<?php

namespace App\Logic\Image;

use App\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class ImageRepository
{
    public function upload( $form_data )
    {

//        if(!File::exists(Config::get('images.full_size') . $form_data['sid'] . '/')) {
//            $FullFolder = File::makeDirectory(Config::get('images.full_size') . '/' . $form_data['sid'], 0775);
//        }
//        if(!File::exists(Config::get('images.icon_size') . $form_data['sid'] . '/')) {
//            $IconFolder = File::makeDirectory(Config::get('images.icon_size') . '/' . $form_data['sid'], 0775);
//        }
        $validator = Validator::make($form_data, Image::$rules, Image::$messages);

        if ($validator->fails()) {

            return Response::json([
                'error' => true,
                'message' => $validator->messages()->first(),
                'code' => 400
            ], 400);

        }

        $photo = $form_data['file'];

        $originalName = $photo->getClientOriginalName();
        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - 4);

        $filename = $this->sanitize($originalNameWithoutExt);
        $allowed_filename = $this->createUniqueFilename( $filename, $form_data['sid'] );

        $filenameExt = $allowed_filename .'.jpg';

        $uploadSuccess1 = $this->original( $photo, $filenameExt, $form_data['sid'] );

        $uploadSuccess2 = $this->icon( $photo, $filenameExt, $form_data['sid'] );

        if( !$uploadSuccess1 || !$uploadSuccess2 ) {

            return Response::json([
                'error' => true,
                'message' => 'Server error while uploading',
                'code' => 500
            ], 500);

        }

        $sessionImage = new Image;
        $sessionImage->filename      = $allowed_filename;
        $sessionImage->original_name = $originalName;
        $sessionImage->sid = $form_data['sid'];
        $sessionImage->save();

        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200);

    }

    public function createUniqueFilename( $filename, $sid )
    {
        $full_size_dir = Config::get('images.full_size') . $sid . '/';
        $full_image_path = $full_size_dir . $filename . '.jpg';

        if ( File::exists( $full_image_path ) )
        {
            // Generate token for image
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken;
        }

        return $filename;
    }

    /**
     * Optimize Original Image
     */
    public function original( $photo, $filename, $sid )
    {
        $manager = new ImageManager();
        $image = $manager->make( $photo )->encode('jpg')->save(Config::get('images.full_size'). $sid . '/' . $filename );

        return $image;
    }

    /**
     * Create Icon From Original
     */
    public function icon( $photo, $filename, $sid )
    {
        $manager = new ImageManager();
        $image = $manager->make( $photo )->encode('jpg')->resize(200, null, function($constraint){$constraint->aspectRatio();})->save( Config::get('images.icon_size') . $sid . '/' . $filename );

        return $image;
    }

    /**
     * Delete Image From Session folder, based on original filename
     */
    public function delete( $originalFilename, $sid)
    {

        $full_size_dir = Config::get('images.full_size') . $sid . '/';
        $icon_size_dir = Config::get('images.icon_size') . $sid . '/';

//        $sessionImage = Image::where('original_name', 'like', $originalFilename)->first();

        $sessionImage = Image::where('filename', '=', substr($originalFilename, 0, -4))->first();

        if(empty($sessionImage))
        {
            return Response::json([
                'error' => true,
                'code'  => 400
            ], 400);

        }

        $full_path1 = $full_size_dir . $sessionImage->filename . '.jpg';
        $full_path2 = $icon_size_dir . $sessionImage->filename . '.jpg';

        if ( File::exists( $full_path1 ) )
        {
            File::delete( $full_path1 );
        }

        if ( File::exists( $full_path2 ) )
        {
            File::delete( $full_path2 );
        }

        if( !empty($sessionImage))
        {
            $sessionImage->delete();
        }

        if (empty(File::files($full_size_dir))){
            $DeleteFull = File::deleteDirectory($full_size_dir);
        }

        if (empty(File::files($icon_size_dir))){
            $DeleteIcon = File::deleteDirectory($icon_size_dir);
        }

        return Response::json([
            'error' => false,
            'code'  => 200,
            'full_path1' => $full_path1
        ], 200);
    }

    function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }
}