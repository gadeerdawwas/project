<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileAccessController extends Controller
{
    //

    // https://dev.to/fractalbit/tips-for-working-with-private-files-in-laravel-1g08
    
    // In FileAccessController.php
    //public function serve(File $file)
    public function serve($file)
    {
        //if(Auth::user() && Auth::id() === $file->user->id) {
            // Here we don't use the Storage facade that assumes the storage/app folder
            // So filename should be a relative path inside storage to your file like 'app/userfiles/report1253.pdf'
            $filepath = storage_path('app/books/'.$file);
            return response()->file($filepath);
        // }else{
        //     return abort('404');
        // }
    }

    public function audioFile($file)
    {
        //if(Auth::user() && Auth::id() === $file->user->id) {
            // Here we don't use the Storage facade that assumes the storage/app folder
            // So filename should be a relative path inside storage to your file like 'app/userfiles/report1253.pdf'
            $filepath = storage_path('app/records/'.$file);
            return response()->file($filepath);
        // }else{
        //     return abort('404');
        // }
    }

    public function audioRecord($file){
        return response()->file(storage_path('app/audio/' . $file));
    }

    public function show_profile($file)
    {
        //if(Auth::user() && Auth::id() === $file->user->id) {
            // Here we don't use the Storage facade that assumes the storage/app folder
            // So filename should be a relative path inside storage to your file like 'app/userfiles/report1253.pdf'
            $filepath = storage_path('app/school_profile/'.$file);
            return response()->file($filepath);
        //}else{
          //  return abort('404');
        //}
    }

}
