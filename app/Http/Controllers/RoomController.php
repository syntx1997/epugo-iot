<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    public function get_all() {
        $data = [];
        $rooms = Room::all();
        foreach ($rooms as $room) {

            $actions = <<<HERE
                <button type="button" id="editRoomBtn" data-id="$room->id" data-room_no="$room->room_no" class="btn btn-link">
                    <i class="fa fa-edit"></i>
                </button>
            HERE;


            $data[] = array_merge($room->toArray(), [
                'actions' => $actions
            ]);
        }

        return \response(['data' => $data], 201);
    }

    public function generate_room_no():Response {
        return response(['room_no' => 'QL' . str_pad(count(Room::all()) + 1, 4, '0', STR_PAD_LEFT)], 201);
    }

    public function add(Request $request) {
        Room::create(['room_no' => $request->room_no]);
        return \response(['message' => 'Room added successfully!'], 201);
    }

    public function edit(Request $request) {
        $validator = Validator::make($request->all(), [
            'room_no' => 'required',
            'id' => 'required'
        ]);

        if($validator->fails()) {
            return \response(['errors' => $validator->errors()], 401);
        }

        $room = Room::find($request->id);
        $room->update(['room_no' => $request->room_no]);

        return \response(['message' => 'Room updated successfully!'], 201);
    }
}
