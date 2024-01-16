<?php

namespace App\Http\Controllers;

use App\Models\Diamond;
use App\Http\Requests\StoreDiamondRequest;
use App\Http\Requests\UpdateDiamondRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiamondController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $diamonds = Diamond::orderBy('diamond_price', 'asc')->get();

        return view('diamonds.index', compact('diamonds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('diamonds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'diamond_category'  => 'required',
            'diamond_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'diamond_amount'    => 'required',
            'diamond_price'    => 'required',
        ]);

        $image = cloudinary()->upload(
            $request->file('diamond_image')->getRealPath(),
            ["folder" => "MikirApp"]
        )->getSecurePath();

        $diamond = Diamond::create([
            'diamond_category' => $request->diamond_category,
            'diamond_image' => $image,
            'diamond_amount'   => $request->diamond_amount,
            'diamond_price'   => $request->diamond_price,
        ]);

        return redirect()->route('diamonds.index')->with('success', 'Diamond created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Diamond $diamond): View
    {
        return view('diamonds.show', compact('diamond'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diamond $diamond): View
    {
        return view('diamonds.edit', compact('diamond'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiamondRequest $request, Diamond $diamond): RedirectResponse
    {
        $this->validate($request, [
            'diamond_category'  => 'required',
            'diamond_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'diamond_amount'    => 'required',
            'diamond_price'    => 'required',
        ]);

        $image = cloudinary()->upload(
            $request->file('diamond_image')->getRealPath(),
            ["folder" => "MikirApp"]
        )->getSecurePath();

        $diamond->update([
            'diamond_category' => $request->diamond_category,
            'diamond_image' => $image,
            'diamond_amount'   => $request->diamond_amount,
            'diamond_price'   => $request->diamond_price,
        ]);

        return redirect()->route('diamonds.index')->with('success', 'Diamond updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diamond $diamond): RedirectResponse
    {
        $diamond->delete();

        return redirect()->route('diamonds.index')->with('success', 'Diamond deleted successfully!');
    }
}
