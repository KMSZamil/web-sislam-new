<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CarBrand;
use Illuminate\Http\Request;

class AllApiController extends Controller
{
    public function get_brands()
    {
        $data = [];
        $data['success'] = 0;
        $data['message'] = "Car Brands Synchronized Unsuccessful";
        $data['car_brands'] = [];

        $data['car_brands'] = CarBrand::where('status', 1)->get();
        if ($data['car_brands']) {
            $data['success'] = 1;
            $data['message'] = "Customer Synchronized Successfully";
            $data['message'] = $data['car_brands'];
        }
        return json_encode($data);
    }
}
