<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Members;
use Illuminate\Http\Request;

class AdminMemberController extends Controller
{
    public function index()
    {
        $members = Members::all();

        return view('admin.member', compact('members')); 
    }

    public function show(Members $member)
    {
        return view('admin.member', compact('member'));
    }

    public function destroy(Members $member)
    {
        $member->delete();
        return view('admin.member')->with('Berhasil menghapus member');
    }
}
