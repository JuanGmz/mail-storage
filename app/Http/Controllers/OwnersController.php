<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use App\Models\Owner;

class OwnersController extends Controller
{
    public function index() {
        $owners = Owner::all(); 
        if (!$owners) {
            return response()->json([
                'message' => 'Owners not found'
            ], 404);
        }

        return response()->json([
            'owners' => $owners
        ], 200); 
    }

    // Show a single owner
    public function show($id) {
        $owner = Owner::find($id);

        if (!$owner) {
            return response()->json([
                'message' => 'Owner not found'
            ], 404);
        }

        return response()->json([
            'owner' => $owner
        ], 200);
    }

    public function store(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $owner = new Owner();

        $owner->first_name = $data['first_name'];
        $owner->last_name = $data['last_name'];
        $owner->phone = $data['phone'];
        $owner->address = $data['address'];

        $owner->save();

        return response()->json([
            'message' => 'Owner created successfully',
            'owner' => $owner
        ], 201);
    }

    // Update an existing owner
    public function update(Request $request, $id){
        $data = $request->all();

        $owner = Owner::find($id); 

        if (!$owner) {
            return response()->json([
                'message' => 'Owner not found'
            ], 404);
        }
        
        $validator = Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $owner->first_name = $data['first_name'];
        $owner->last_name = $data['last_name'];
        $owner->phone = $data['phone'];
        $owner->address = $data['address'];

        $owner->save();

        return response()->json([
            'message' => 'Owner updated successfully',
            'owner' => $owner
        ], 200);
    }

    // Delete an owner
    public function destroy($id) {
        $owner = Owner::find($id);

        if (!$owner) {
            return response()->json([
                'message' => 'Owner not found'
            ], 404);
        }

        $owner->delete(); 

        return response()->json([
            'message' => 'Owner deleted successfully'
        ], 200);
    }
}