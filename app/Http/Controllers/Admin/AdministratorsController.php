<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use Illuminate\Http\Request;

class AdministratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //1ページに最大20件表示
        $administrators = Administrator::paginate(20);
        return view('admin.administrators.index', ['administrators' =>  []]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if (strlen($request->loginid) > 0) {
            $administrators = Administrator::where('account', 'like', '%' . $request->loginid . '%')->paginate(20);
        } else {
            $administrators = Administrator::paginate(20);
        }
        return view('admin.administrators.index', ['administrators' => $administrators]);
    }

    public function create(Request $request)
    {
        if (!(url()->full() == url()->previous())) {
            $request->session()->put('preUrl', url()->previous());
        }
        return view('admin.administrators.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, int $administratorId)
    {
        if (!$administratorId) {
            return redirect()->route('administrators.index');
        }
        $administrator = Administrator::find($administratorId);

        if (Administrator::count() > 1) {
            $delOk = true;
        } else {
            $delOk = false;
        }
        if (!(url()->full() == url()->previous())) {
            $request->session()->put('preUrl', url()->previous());
        }

        return view('admin.administrators.edit', ['administrator' => $administrator, 'delOk' => $delOk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdministratorRequest  $request
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(AdministratorsUpdate $request)
    {
        try {
            $administrator = (!$request->administrators_id) ? new Administrator() : Administrator::find($request->administrators_id);
            $administrator->account = $request->account;
            if (isset($request->password) && strlen($request->password) > 0) {
                $administrator->password = Hash::make($request->password);
            }
            $administrator->save();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', ['Error']);
        }

        $request->session()->flash('message', 'Success');
        return redirect()->route('administrators.index');
    }
}
