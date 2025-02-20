<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function uploadFile(Request $request)
    {
        if ($request->file('file')) {
            $file = $request->file('file');
            $filePath = $file->store('uploads', 'public');
            $fileUrl = asset('storage/' . $filePath);

            return "File uploaded successfully! <a href='$fileUrl'>View File</a>";
        }

        return "File upload failed.";
    }


}
