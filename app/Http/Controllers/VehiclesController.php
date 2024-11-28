<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Vehicle;

class VehiclesController extends Controller {
    public function index() {
        $vehicles = Vehicle::all();

        if (!$vehicles) {
            return response()->json([
                'message' => 'Vehicles not found'
            ], 404);
        }

        return response()->json([
            'vehicles' => $vehicles
        ], 200);
    }

    public function store(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'owner_id' => 'required|exists:owners,id',
            'fuel_type_id' => 'required|exists:fuel_types,id',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $vehicle = new Vehicle();

        $vehicle->owner_id = $data['owner_id'];
        $vehicle->fuel_type_id = $data['fuel_type_id'];
        $vehicle->brand = $data['brand'];
        $vehicle->mod = $data['model'];

        if (!$vehicle->save()) {
            return response()->json([
                "message" => "Vehicle not created"
            ], 500);
        }

        return response()->json([
            "message" => "Vehicle created",
            "vehicle" => $vehicle
        ]);
    }

    public function show($id) {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json([
                'message' => 'vehicle not found'
            ], 404);
        }

        return response()->json([
            'vehicle' => $vehicle
        ], 200);
    }

    public function update(Request $request, int $id) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'owner_id' => 'required|exists:owners,id',
            'fuel_type_id' => 'required|exists:fuel_types,id',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json([
                "message" => "Vehicle not found"
            ], 404);
        }

        $vehicle->owner_id = $data['owner_id'];
        $vehicle->fuel_type_id = $data['fuel_type_id'];
        $vehicle->brand = $data['brand'];
        $vehicle->mod = $data['model'];

        $vehicle->save();

        return response()->json([
            "message" => "Vehicle updated",
            "vehicle" => $vehicle
        ], 200);
    }

    public function destroy(int $id) {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json([
                "message" => "Vehicle not found"
            ], 404);
        }

        $vehicle->delete();

        return response()->json([
            "message" => "Vehicle deleted"
        ], 200);
    }
}