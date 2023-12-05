<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $sell_item = $user->items;
        $sold_item = $user->sold_items;

        $profile = null;

        if ($user->profile) {
            $profile = $user->profile;
        }

        return view('mypage', compact('user', 'profile', 'sell_item', 'sold_item'));
    }

    public function profile()
    {
        $user = Auth::user();
        $profile = null;

        if ($user->profile) {
            $profile = $user->profile;
        }

        return view('profile', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $form = $request->all();
        unset($form['_token']);

        $user->update($form);
        $fileUrl = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            $fileUrl = Storage::url($path);
        }

        if ($user->profile) {
            $user->profile->update(array_merge($form, ['img_url' => $fileUrl]));
        } else {
            $user->profile()->create(array_merge($form, ['img_url' => $fileUrl]));
        }

        return redirect('/mypage/profile');
    }
}
