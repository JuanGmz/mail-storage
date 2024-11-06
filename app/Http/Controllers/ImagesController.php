<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller {
    public function uploadImage(Request $request) {
        $file = $request->file('file');

        if (!$file) {
            return response()->json([
                'message' => 'File not uploaded',
            ], 404);
        }
        
        $user = auth()->user();

        $oldPath = $user->image_path;
    
        if ($oldPath) {
            Storage::disk('s3')->delete($oldPath);
        }
    
        $newPath = Storage::disk('s3')->put('23170006', $file);
        $user->image_path = $newPath;
    
        $user->save();
    
        return response()->json([
            'message' => 'Image uploaded successfully',
        ]);
    }

    public function getImage() {
        $user = auth()->user();

        $path = $user->image_path;

        if (!$path) {
            return response()->json([
                'message' => 'Not found image',
            ]);
        }

        $content = Storage::disk('s3')->get($path);

        return response($content)->header('content-type', 'image/png');
    }
}