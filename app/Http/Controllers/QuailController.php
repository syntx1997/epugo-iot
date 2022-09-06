<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quail;
use App\Models\Room;
use Illuminate\Support\Facades\Validator;

class QuailController extends Controller
{
    public function get_all() {
        $data = [];

        $rooms = Room::all();
        foreach ($rooms as $room) {

            $quail = Quail::where('room_id', $room->id)->first();
            $quantity = $quail->quantity ?? 0;

            $actions = <<<HERE
                <button type="button" class="btn btn-link" id="addQuailBtn" data-id="$room->id" data-room_no="$room->room_no" data-quantity="$quantity"><i class="fa fa-plus"></i></button>
            HERE;

            $data[] = array_merge($room->toArray(), [
                'quantity' => $quantity,
                'actions' => $actions
            ]);
        }

        return response(['data' => $data], 201);
    }

    public function add(Request $request) {
        $validator = Validator::make($request->all(), [
            'room_no' => 'required',
            'current_stock' => 'required',
            'quantity' => 'required',
            'id' => 'required'
        ]);

        if($validator->fails()) {
            return response(['errors' => $validator->errors()], 401);
        }

        $room = Quail::where('id', $request->id)->first();

        if($room) {
            $updateRoom = Quail::find($request->id);
            $updateRoom->update([
                'quantity' => ($request->current_stock + $request->quantity)
            ]);
        } else {
            Quail::create([
                'room_id' => $request->id,
                'quantity' => $request->quantity
            ]);
        }

        return response(['message' => 'Quail added successfully!'], 201);
    }
}
