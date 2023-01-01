<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    function index()
    {
        $allrooms = Room::all();

        return $allrooms;
    }

    function create()
    {
        $allRooms = Room::all();

        return $allRooms;
    }

    function store()
    {
        $data = request()->all();

        $room_creation = Room::create([
            'name' => $data['name'],
            'capacity' => $data['capacity'],
            'price' => $data['price'],
            'floor_id' => $data['floor_id'],

        ]);
        return $room_creation;
    }

    function edit($roomId)
    {
        $data = request()->find($roomId);

        return $data;
    }

    function update(Request $request, $roomId)
    {
        $data = $request->all();
        // dd($data);
        $room = floor::find($roomId);
        $room->update($data);

        return $room;
    }

    function destroy($roomId)
    {
        return  Room::destroy($roomId);
    }
}
