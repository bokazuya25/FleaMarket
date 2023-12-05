<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index($item_id)
    {
        $user = Auth::user();
        $item = Item::find($item_id);
        $profile = null;

        if ($user->profile) {
            $profile = $user->profile;
        }

        return view('purchase', compact('item', 'profile'));
    }

    public function address($item_id)
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('address', compact('user', 'profile', 'item_id'));
    }

    public function update_address(Request $request, $item_id)
    {
        $user = Auth::user();
        $form = $request->all();
        $isChanged = false;
        unset($form['_token']);

        if ($user->profile) {
            foreach ($form as $key => $value) {
                if ($user->profile->$key != $value) {
                    $isChanged = true;
                    break;
                }
            }

            $user->profile->update($form);
        } else {
            $user->profile()->create($form);
            $isChanged = true;
        }

        if ($isChanged) {
            session()->flash('success', '配送先を変更しました');
        }

        return redirect('/purchase/' . $item_id);
    }

    public function payment($item_id)
    {
        return view('/payment', compact('item_id'));
    }
}
