<?php

namespace App\Http\Controllers\Parents\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parent\UpdateParentProfile;
use App\Interfaces\Parents\ParentProfileInterface;
use App\Models\MyParent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentProfileController extends Controller
{
    private $ParentProfile;

    public function __construct(ParentProfileInterface $ParentProfile)
    {
        $this->ParentProfile = $ParentProfile;
    }

    public function index()
    {
        return $this->ParentProfile->index();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateParentProfile $request)
    {
        return $this->ParentProfile->update($request);
    }

    public function destroy($id)
    {
        //
    }
}
