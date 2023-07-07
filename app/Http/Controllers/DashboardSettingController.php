<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardSettingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function account()
    {
        $user = Auth::user();

        return view('pages.dashboard-account', [
            "user" => $user
        ]);
    }
    public function update(Request $request,$redirect)
    {
        $item = Auth::user();
        $data = $request->all();

        $item->update($data);

        return redirect()->route($redirect);
    }
}
