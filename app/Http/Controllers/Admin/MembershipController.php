<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Membership\MembershipCreateRequest;
use App\Http\Requests\Admin\Membership\MembershipUpdateRequest;
use App\Models\Membership;
use App\Service\Admin\MembershipService;

class MembershipController extends Controller
{
      /**
     * Display a listing of the resource.
     */

    protected $membershipService;

    public function __construct(MembershipService $membershipService)
    {
        $this->membershipService = $membershipService;
    }

    public function index()
    {
        $memberships = Membership::all();

        return view('content.admin.membership.index', compact('memberships'));
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
    public function store(MembershipCreateRequest $request)
    {
        $membership = $this->membershipService->createMembership($request->validated());

        if ($membership) {
            return redirect()->back()->with('success', 'Berhasil menambah data membership');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah data membership');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Membership $membership)
    {
        return view("content.admin.membership.detail", compact('membership'));
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
    public function update(MembershipUpdateRequest $request, Membership $membership)
    {
        $membership = $this->membershipService->updateMembership($request->validated(), $membership);

        if ($membership) {
            return redirect()->back()->with('success', 'Berhasil mengubah data membership');
        } else {
            return redirect()->back()->with('error', 'Gagal mengubah data membership');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Membership $membership)
    {
        $membership = $this->membershipService->deleteMembership($membership);

        if ($membership) {
            return redirect()->route("admin.membership.index")->with('success', 'Berhasil menghapus data membership');
        } else {
            return redirect()->route("admin.membership.index")->with('error', 'Gagal menghapus data membership');
        }
    } 
}
