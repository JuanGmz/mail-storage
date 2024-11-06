<?php

namespace App\Http\Controllers;

use App\Models\FuelType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FuelTypesController extends Controller
{
    public function index() {
        $fuelTypes = FuelType::all();

        if (!$fuelTypes) {
            return response()->json([
                "message" => "Fuel types not found"
            ], 404);
        }

        return response()->json([
            "fuelTypes" => $fuelTypes
        ], 200);
    }

    public function store(Request $request) {
        
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $fuelType = new FuelType();

        $fuelType->name = $data['name'];

        if (!$fuelType->save()) {
            return response()->json([
                "message" => "Fuel type not created"
            ], 500);
        }

        return response()->json([
            "message" => "Fuel type created",
            "fuelType" => $fuelType
        ], 201);
    }

    public function show(int $id) {
        $fuelType = FuelType::find($id);

        if (!$fuelType) {
            return response()->json([
                "message" => "Fuel type not found"
            ], 404);
        }

        return response()->json([
            "fuelType" => $fuelType
        ]);
    }

    public function update(Request $request, int $id) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $fuelType = FuelType::find($id);

        if (!$fuelType) {
            return response()->json([
                "message" => "Fuel type not found"
            ], 404);
        }

        $fuelType->name = $data['name'];

        if (!$fuelType->save()) {
            return response()->json([
                "message" => "Fuel type not updated"
            ], 500);
        }

        return response()->json([
            "message" => "Fuel type updated",
            "fuelType" => $fuelType
        ]);
    }

    public function destroy(int $id) {
        $fuelType = FuelType::find($id);

        if (!$fuelType) {
            return response()->json([
                "message" => "Fuel type not found"
            ], 404);
        }

        $fuelType->delete();

        return response()->json([
            "message" => "Fuel type deleted"
        ]);
    }
}