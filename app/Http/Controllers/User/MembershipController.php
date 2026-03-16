<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\BuyMembershipRequest;
use App\Models\Subscription;
use App\Models\User;
use App\Service\User\MembershipService;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    protected $membershipService;

    public function __construct(MembershipService $membershipService)
    {
        $this->membershipService = $membershipService;
    }

    public function buy(BuyMembershipRequest $request)
    {
        $user = User::with("subscription")->find(Auth::guard("user")->user()->id);

        if ($user->subscription && $user->subscription->status == 'successful') {
            return redirect()->back()->with("error", "Anda sudah menjadi member");
        }

        $url = $this->membershipService->buyMembership($request->validated());

        if ($url) {
            return redirect()->away($url);
        }
    }

    public function delete(Subscription $subscription)
    {
        $subscription->delete();

        return redirect()->back()->with("success", "Berhasil memberhentikan langganan");
    }
}
