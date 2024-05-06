<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;


class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        // stochez to db
        Image::create([
            'image' => $imageName
        ]);

        $getData = Image::all();
        session()->flash('data_img', $getData);
        return redirect()->back()->with('data', $getData);
    }
}
