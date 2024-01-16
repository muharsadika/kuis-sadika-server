<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AvatarController extends Controller
{
    public function index(): View
    {
        // $avatars = Avatar::all();
        $avatars = Avatar::orderBy('avatar_price', 'asc')->get();

        return view('avatars.index', compact('avatars'));
    }

    public function show(Avatar $avatar): View
    {
        return view('avatars.show', compact('avatar'));
    }

    public function create(): View
    {
        return view('avatars.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'avatar_url'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'avatar_name'  => 'required',
            'avatar_price'    => 'required',
        ]);

        $image = cloudinary()->upload(
            $request->file('avatar_url')->getRealPath(),
            ["folder" => "kuis-sadika"]
        )->getSecurePath();

        $avatar = Avatar::create([
            'avatar_url' => $image,
            'avatar_name' => $request->avatar_name,
            'avatar_price'   => $request->avatar_price,
        ]);

        return redirect()->route('avatars.index')->with('success', 'Avatar created successfully!');
    }

    public function edit(Avatar $avatar): View
    {
        return view('avatars.edit', compact('avatar'));
    }

    public function update(Request $request, Avatar $avatar): RedirectResponse
    {
        $this->validate($request, [
            'avatar_url'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'avatar_name'  => 'required',
            'avatar_price'    => 'required',
        ]);

        $image = cloudinary()->upload(
            $request->file('avatar_url')->getRealPath(),
        )->getSecurePath();

        $avatar->update([
            'avatar_url' => $image,
            'avatar_name' => $request->avatar_name,
            'avatar_price'   => $request->avatar_price,
        ]);

        return redirect()->route('avatars.index')->with('success', 'Avatar updated successfully!');
    }

    public function destroy(Avatar $avatar): RedirectResponse
    {
        $avatar->delete();

        return redirect()->route('avatars.index')->with('success', 'Avatar deleted successfully!');
    }
}
