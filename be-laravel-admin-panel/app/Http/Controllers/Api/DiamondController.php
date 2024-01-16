<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiamondResource;
use App\Models\Diamond;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiamondController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diamonds = Diamond::orderBy('diamond_price', 'asc')->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'List diamond',
            'data' => DiamondResource::collection($diamonds)
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'diamond_category'  => 'required',
            'diamond_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'diamond_amount'  => 'required',
            'diamond_price'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = cloudinary()->upload(
            $request->file('diamond_image')->getRealPath(),
            ["folder" => "MikirApp"]
        )->getSecurePath();

        $diamond = Diamond::create([
            'diamond_category' => $request->diamond_category,
            'diamond_image' => $image,
            'diamond_amount' => $request->diamond_amount,
            'diamond_price' => $request->diamond_price,
        ]);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Data diamond Berhasil Ditambahkan',
            'data' => new DiamondResource($diamond)
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $diamond = Diamond::find($id);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Detail diamond',
            'data' => new DiamondResource($diamond),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'diamond_category'  => 'required',
            'diamond_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'diamond_amount'  => 'required',
            'diamond_price'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $image = cloudinary()->upload(
            $request->file('diamond_image')->getRealPath(),
            ["folder" => "MikirApp"]
        )->getSecurePath();

        $diamond = Diamond::find($id);

        $diamond->update([
            'diamond_category' => $request->diamond_category,
            'diamond_image' => $image,
            'diamond_amount' => $request->diamond_amount,
            'diamond_price' => $request->diamond_price,
        ]);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Data diamond Berhasil Diubah',
            'data' => new DiamondResource($diamond)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diamond = Diamond::find($id);

        $diamond->delete();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Data diamond Berhasil Dihapus',
            'data' => new DiamondResource($diamond),
        ], 200);
    }
}
