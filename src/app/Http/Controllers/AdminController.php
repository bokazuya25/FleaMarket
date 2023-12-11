<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function deleteUser(Request $request)
    {
        $userId = $request->id;
        User::find($userId)->delete();

        session(['selectedTab' => 'user_list']);
        return redirect('/mypage')->with('success', 'ユーザーID:' . $userId . 'を削除しました。');
    }
}
