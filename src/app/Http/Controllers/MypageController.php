<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MypageController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $sellItem = $user->items;
        $soldItem = $user->soldToItems;
        $users = User::paginate(10);

        return view('mypage', compact('user', 'sellItem', 'soldItem', 'users'));
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
        $userForm = $request->only('name');
        $userChanged = false;
        unset($request->all()['_token']);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            $imgUrl = Storage::url($path);
            $userForm['imgUrl'] = $imgUrl;
        }

        foreach ($userForm as $key => $value) {
            if ($user->$key != $value) {
                $userChanged = true;
                break;
            }
        }

        if ($userChanged) {
            $user->update($userForm);
        }

        $profileChanged = false;
        $profile = $user->profile;
        $profileForm = $request->only(['postcode', 'address', 'building']);

        if ($profile) {
            foreach ($profileForm as $key => $value) {
                if ($profile->$key != $value) {
                    $profileChanged = true;
                    break;
                }
            }
            if ($profileChanged) {
                $profile->update($profileForm);
            }
        } else {
            $user->profile()->create($profileForm);
            $profileChanged = true;
        }

        if ($userChanged || $profileChanged) {
            session()->flash('success', 'プロフィールを変更しました');
        }

        return redirect('/mypage');
    }
}
