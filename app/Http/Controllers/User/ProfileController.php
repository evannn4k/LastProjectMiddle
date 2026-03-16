<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Models\User;
use App\Service\User\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function profile()
    {
        $user = User::with("subscription.membership")->find(Auth::guard("user")->user()->id);
        return view("content.user.profile", compact("user"));
    }

    public function update(UpdateProfileRequest $request)
    {
        $this->profileService->updateUser(User::findOrFail(Auth::guard("user")->user()->id), $request->validated());

        return redirect()->route("profile")->with("success", "Profile berhasil diupdate");
    }

    public function delete(Request $request)
    {
        $this->profileService->deleteUser(User::findOrFail(Auth::guard("user")->user()->id), $request);

        return redirect()->intended("/")->with("success", "Berhasil menghapus akun");
    }
}
