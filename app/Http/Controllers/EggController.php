<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egg;
use App\Models\Room;
use Illuminate\Support\Facades\Validator;

class EggController extends Controller
{
    public function get_all() {
        $data = [];

        $rooms = Room::all();
        foreach ($rooms as $room) {

            $egg = Egg::where('room_id', $room->id)->first();
            $total = $egg->total ?? 0;

            $actions = <<<HERE
                <button type="button" id="setTotalEggBtn" class="btn btn-link" data-id="$room->id" data-room_no="$room->room_no" data-total="$total"> <i class="fa fa-edit"></i> Set Total Egg</button>
            HERE;

            $data[] = array_merge($room->toArray(), [
                'total' => $total,
                'actions' => $actions
            ]);
        }

        return response(['data' => $data], 201);
    }

    public function set(Request $request) {
        $validator = Validator::make($request->all(), [
            'room_no' => 'required',
            'current_total' => 'required',
            'total' => 'required',
            'id' => 'required'
        ]);

        if($validator->fails()) {
            return response(['errors' => $validator->errors()], 401);
        }

        $room = Egg::where('room_id', $request->id)->first();
        if($room) {
            $updateEgg = Egg::find($request->id);
            $updateEgg->update([
                'total' => ($request->current_total + $request->total)
            ]);
        } else {
            Egg::create([
                'room_id' => $request->id,
                'total' => $request->total
            ]);
        }

        return response(['message' => 'Egg set successfully!'], 201);
    }
}
