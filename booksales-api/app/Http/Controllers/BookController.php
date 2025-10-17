<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();

        if ($books->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found",
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $books
        ], 200);
    }

    public function store(Request $request){
        // Validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        //Check Validator Error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ],422);
        }

        // Upload Image
        $image = $request->file('cover_photo');
        $image->store('books', 'public');

        // Insert Data
        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover_photo' => $image->hashName(),
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
        ]);

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Book added successfully',
            'data' => $book
        ], 201);
    }

    public function show(string $id){
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get Detail Resource",
            "data" => $book
        ], 200);
    }

    public function update(Request $request, string $id){
        // 1. Mencari Data
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        // 2. Validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ],422);
        }
        // 3. Siapkan Data Yang Akan Diupdate
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
        ];

        // 4. Handle Image (upload & delete)
        if ($request->hasFile('cover_photo')) {
            // Upload new image
            $image = $request->file('cover_photo');
            $image->store('books', 'public');
            
            // Delete old image
            if ($book->cover_photo) {
                Storage::disk('public')->delete('books/'.$book->cover_photo);
            }

            $data['cover_photo'] = $image->hashName();
        }

        // 5. Update Data
        $book->update($data);

        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully",
            "data" => $book
        ], 200);    
    }

    public function destroy(string $id){
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        if ($book->cover_photo) {
            // Delete from storage
            Storage::disk('public')->delete('books/'.$book->cover_photo);
        }

        $book->delete();

        return response()->json([
            "success" => true,
            "message" => "Resource deleted successfully",
        ], 200);
    }
}
