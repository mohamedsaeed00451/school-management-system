<?php

namespace App\Http\Controllers\Students;

use App\Http\Requests\StorPromotions;
use App\Interfaces\StudentsPromotionsInterface;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PromotionController extends Controller
{
    private $Promotions;
    public function __construct(StudentsPromotionsInterface $Promotions)
    {
        $this->Promotions = $Promotions;
    }
    public function index()
    {
        return $this->Promotions->index();
    }
    public function create()
    {
        return $this->Promotions->create();
    }

    public function store(StorPromotions $request)
    {
        return $this->Promotions->store($request);
    }

    public function show(Promotion $promotion)
    {
        //
    }
    public function edit(Promotion $promotion)
    {
        //
    }

    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    public function destroy(Request $request)
    {
        return $this->Promotions->destroy($request);
    }
}
