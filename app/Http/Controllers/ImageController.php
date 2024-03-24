<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        $image = Image::create($request->validated());
        return $image;
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        return $image;
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        
        $image->update($request->validated());
        return $image;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        $user_abilites = Auth::user()->role;
        if ($user_abilites == 'admin') {
            return $image->delete();
        }else{echo'notallowedmt allowed';}
    }
}
