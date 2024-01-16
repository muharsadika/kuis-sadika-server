<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Avatar;
use App\Http\Requests\StoreAvatarRequest;
use App\Http\Requests\UpdateAvatarRequest;
use App\Http\Resources\AvatarResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $avatar = Avatar::all();
        $avatars = Avatar::orderBy('avatar_price', 'asc')->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'List avatar',
            'data' => AvatarResource::collection($avatars)
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    // public function store(StoreAvatarRequest $request)
    // jika menggunakan StoreAvatarRequest tidak perlu menggunakan validator
    {
        $validator = Validator::make($request->all(), [
            'avatar_url'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'avatar_name'  => 'required',
            'avatar_price'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = cloudinary()->upload(
            $request->file('avatar_url')->getRealPath(),
            ["folder" => "kuis-sadika"]
        )->getSecurePath();

        $avatar = Avatar::create([
            'avatar_url' => $image,
            'avatar_name' => $request->avatar_name,
            'avatar_price'   => $request->avatar_price,
        ]);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Avatar Berhasil Ditambahkan',
            'data' => new AvatarResource($avatar),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Avatar $avatar)
    {
        // $avatar = Avatar::findOrFail($avatar->id);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Detail avatar',
            'data' => new AvatarResource($avatar),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Avatar $avatar)
    {
        $validator = Validator::make($request->all(), [
            'avatar_url'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'avatar_name'  => 'required',
            'avatar_price'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $image = cloudinary()->upload(
            $request->file('avatar_url')->getRealPath(),
            ["folder" => "kuis-sadika"]
        )->getSecurePath();

        $avatar->update([
            'avatar_url' => $image,
            'avatar_name' => $request->avatar_name,
            'avatar_price'   => $request->avatar_price,
        ]);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Data avatar Berhasil Diubah',
            'data' => new AvatarResource($avatar),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avatar $avatar)
    {
        $avatar->delete();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Data avatar Berhasil Dihapus',
            'data' => new AvatarResource($avatar),
        ], 200);
    }
}
