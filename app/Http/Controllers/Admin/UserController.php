<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserCreateRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use App\Models\User;
use App\Service\Admin\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('content.admin.user.index', compact('users'));
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
    public function store(UserCreateRequest $request)
    {
        $user = $this->userService->createUser($request->validated());

        if ($user) {
            return redirect()->back()->with('success', 'Berhasil menambah data pengguna');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah data pengguna');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user = $this->userService->updateUser($user, $request->validated());

        if ($user) {
            return redirect()->back()->with('success', 'Berhasil mengubah data pengguna');
        } else {
            return redirect()->back()->with('error', 'Gagal mengubah data pengguna');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user = $this->userService->deleteUser($user);

        if ($user) {
            return redirect()->route("admin.user.index")->with('success', 'Berhasil menghapus data pengguna');
        } else {
            return redirect()->route("admin.user.index")->with('error', 'Gagal menghapus data pengguna');
        }
    }
}
