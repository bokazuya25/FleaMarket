<?php

namespace App\Http\Controllers;

use App\Mail\StaffInvitation;
use App\Models\Invitation;
use App\Models\Shop;
use App\Models\Shop_staff;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class ShopOwnerController extends Controller
{
    public function showStaff($shop_id)
    {
        $shopStaff = Shop::where('id', $shop_id)->with(['users' => function ($query) {
            $query->role('ShopStaff');
        }])->paginate(10);

        return view('staff', compact('shop_id', 'shopStaff'));
    }

    public function deleteStaff(Request $request)
    {
        $shopStaffId = $request->id;
        Shop_staff::find($shopStaffId)->delete();

        return redirect()->back();
    }

    public function inviteStaff(Request $request) {
        $email = $request->input('email');

        $token = Str::random(60);
        Invitation::create([
            'email' => $email,
            'token' => $token,
        ]);

        $invitationLink = url('/register?token=' . $token);
        Mail::to($email)->send(new StaffInvitation($invitationLink));

        return back()->with('success','招待メールを送信しました');
    }
}
