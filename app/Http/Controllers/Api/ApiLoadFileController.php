<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ApiLoadFileController extends Controller
{
    public function __invoke(Request $request)
    {
//        $fileName = time() . '.' . $request->file->getClientOriginalExtension();
//        $request->file->move(public_path('files'), $fileName);
        $fileName = Storage::disk('public')->put('files', $request->file);
        return response()->json(['file' => $fileName]);
    }
}
