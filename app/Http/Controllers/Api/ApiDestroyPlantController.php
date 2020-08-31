<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;

class ApiDestroyPlantController extends Controller
{
    public function __invoke(Request $request)
    {
        $plantId = $request['plant_id'];
        Plant::destroy($plantId);

        return response()->json();
    }
}
