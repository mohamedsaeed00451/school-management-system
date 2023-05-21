<?php

namespace App\Repositories\Parents;


use App\Interfaces\Parents\ParentProfileInterface;
use App\Models\MyParent;
use Exception;
use Illuminate\Support\Facades\Hash;

class ParentProfileRepository implements ParentProfileInterface
{

	public function index()
	{
        $information = MyParent::findOrFail(auth()->user()->id);
        return view('pages.Parents.Dashboard.profile', compact('information'));
	}

	public function update($request)
	{
        try {

            if (!empty($request->Password)) {

                MyParent::findOrFail(auth()->user()->id)
                    ->update([
                        'Name_Father' => ['en' => $request->Name_Father_en, 'ar' => $request->Name_Father_ar],
                        'password' => Hash::make($request->Password),
                    ]);

                toastr()->success(trans('Message_trans.Update'));
                return redirect()->route('parentProfile.index');

            } else {

                MyParent::findOrFail(auth()->user()->id)
                    ->update([
                        'Name_Father' => ['en' => $request->Name_Father_en, 'ar' => $request->Name_Father_ar],
                    ]);

                toastr()->success(trans('Message_trans.Update'));
                return redirect()->route('parentProfile.index');
            }

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}
}
