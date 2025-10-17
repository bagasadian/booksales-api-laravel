<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();

        if ($genres->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found",
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $genres
        ], 200);
    }

    public function store(Request $request){
        //Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        //Check Validator Error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ],422);
        }

        //Insert Data
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        //Response
        return response()->json([
            "success" => true,
            "message" => "Genre created successfully",
            "data" => $genre
        ], 201);
    }

    public function show(string $id){
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get Resource Detail",
            "data" => $genre
        ], 200);
    }
    
    public function update(Request $request, string $id){
        $genre = Genre::find($id);
        // 1. Mencari data
        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found",
            ], 404);
        }

        // 2. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ],422);
        }

        // Prepare Data
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // 5. Update Data
        $genre->update($data);

        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully",
            "data" => $genre
        ], 200);
    }

    public function destroy(string $id){
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found",
            ], 404);
        }

        $genre->delete();

        return response()->json([
            "success" => true,
            "message" => "Resource deleted successfully",
        ], 200);
    }
}