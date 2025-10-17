<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found",
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $authors
        ], 200);
        
    }

    public function store(Request $request){
        //Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'bio' => 'required|string',
        ]);

        //Check Validator Error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ],422);
        }

        //Insert Data
        $author = Author::create([
            'name' => $request->name,
            'bio' => $request->bio,
        ]);

        //Response
        return response()->json([
            "success" => true,
            "message" => "Author created successfully",
            "data" => $author
        ], 201);
    }

    public function show(string $id){
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get Detail Resource",
            "data" => $author
        ], 200);
    }
    public function update(Request $request, string $id){
        // 1. Mencari data
        $author = Author::find($id);
        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        // 2. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'bio' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ],422);
        }

        // 4. Prepare Data for Update
        $data = [
            'name' => $request->name,
            'bio' => $request->bio,
        ];

        // Menghapus Nilai yang Kosong
        $data = array_filter($data, function($value) {
            return !is_null($value);
        });

        // Cek Jika Tidak Ada Data untuk Update
        if (empty($data)) {
            return response()->json([
                "success" => false,
                "message" => "No data provided for update",
            ], 400);
        }

        // 5. Update Data
        $author->update($data);

        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully",
            "data" => $author
        ], 200);    
    }

    public function destroy(string $id){
        $author = Author::find($id);
        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        $author->delete();

        return response()->json([
            "success" => true,
            "message" => "Resource deleted successfully",
        ], 200);
    }
}