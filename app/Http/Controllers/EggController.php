<?php

namespace App\Http\Controllers;

use App\Models\Egg;
use Carbon\Carbon;

class EggController extends Controller
{
    public function get_all() {
        $data = [];
        $eggs = Egg::all();

        foreach ($eggs as $egg) {
            $data[] = array_merge($egg->toArray(), [
                'date' => Carbon::parse($egg->created_at)->format('m/d/Y')
            ]);
        }

        return response(['data' => $data], 201);
    }
}
