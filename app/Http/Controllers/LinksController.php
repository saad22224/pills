<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Links;

class LinksController extends Controller
{
    public function createShareLink()
    {
        $user = auth()->user(); // المستخدم الحالي

        // إنشاء الرابط
        $link = $user->shareLinks()->create([
            'user_id' => $user->id,
            'token' => Str::random(32),
            'expires_at' => Carbon::now()->addDays(7), // صلاحية الرابط 7 أيام
        ]);

        // إعادة توجيه مع إشعار بالرابط
        return redirect()->route('invoices.index')->with('success', 'Share link created: ' . route('user.invoices.share', ['token' => $link->token]));
    }

    public function viewSharedInvoices($token)
{
    $link = Links::where('token', $token)->first();

    if (!$link || $link->expires_at->isPast()) {
        abort(404, 'The link is invalid or expired.');
    }

    $user = $link->user;
    $invoices = $user->invoices;

    return view('dashboard.shared_invoices', compact('invoices', 'user'));
}

}
