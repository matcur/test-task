<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;

class ApiCreatePlantController extends Controller
{
    public function __invoke(Request $request)
    {
        $plantName = $request['plant_name'];
        Plant::create(['name' => $plantName]);

        return response()->json();
    }
}
