<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quail;
use App\Models\Room;

class QuailController extends Controller
{
    public function get_all() {
        $data = [];

        $rooms = Room::all();
        foreach ($rooms as $room) {

            $quantity = $quail->quantity ?? 0;

            $actions = <<<HERE
                <button type="button" class="btn btn-link" id="addQuailBtn" data-room_id="$room->id" data-room_no="$room->room_no" data-quantity="$quantity"><i class="fa fa-plus"></i></button>
            HERE;

            $quail = Quail::where('room_id', $room->id)->first();

            $data[] = array_merge($room->toArray(), [
                'quantity' => $quantity,
                'actions' => $actions
            ]);
        }

        return response(['data' => $data], 201);
    }
}
