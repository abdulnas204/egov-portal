<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use App\Models\GovernmentAdmin;
use App\Models\LogRequests;
use Illuminate\Http\Request;

class GovernmentAdminsController extends Controller
{
    public function index()
    {
    	$seo_title 	= __('titles.government.admin.index');
    	$admins 	= GovernmentAdmin::all();
        return view('government.admin.index', compact('seo_title', 'admins'));
    }

    public function show($id)
    {
    	$admin = GovernmentAdmin::find($id);
        $logs  = LogRequests::where('user', $admin->id)->where('type', 'government')->orderBy('id', 'desc')->limit(100)->get();
    	$seo_title 	= __('titles.government.admin.show', ['name' => $admin->full_name]);
        return view('government.admin.show', compact('seo_title', 'admin', 'logs'));
    }

    public function edit($id)
    {
        $admin = GovernmentAdmin::find($id);
        $seo_title  = __('titles.government.admin.edit', ['name' => $admin->full_name]);
        return view('government.admin.edit', compact('seo_title', 'admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = GovernmentAdmin::find($id);
        $admin->update([
            'full_name'         => $request->input('full_name'),
            'position_name'     => $request->input('position_name'),
            'name'              => $request->input('name'),
            'role'              => $request->input('role'),
            'active'            => $request->input('active'),
        ]);

        return redirect()->route('government.officials.edit', [$admin->id])->with('message', ['type' => 'alert-success', 'text' => 'Government official updated!']);
    }

    public function create()
    {
        $seo_title  = __('titles.government.admin.create');
        return view('government.admin.create', compact('seo_title'));
    }

    public function store(Request $request)
    {
        $admin = GovernmentAdmin::create($request->all());
        return redirect()->route('government.officials.show', [$admin->id])->with('message', ['type' => 'alert-success', 'text' => 'Government official added!']);
    }

    public function editPassword(Request $request, $id)
    {
    	$admin = GovernmentAdmin::find($id);
    	$admin->password = $request->input('password');
    	$admin->save();
    }
}
