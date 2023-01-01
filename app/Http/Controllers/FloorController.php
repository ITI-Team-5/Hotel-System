<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FloorController extends Controller
{
    function index()
    {
        $allfloors = Floor::all();

        return $allfloors;
    }

    function create()
    {
        $allfloors = Floor::all();

        return $allfloors;
    }

    function store()
    {
        $data = request()->all();

        $floor_creation = floor::create([
            'name' => $data['name'],

        ]);
        return $floor_creation;
    }

    function edit($floorId)
    {
        $data = request()->find($floorId);

        return $data;
    }

    function update(Request $request, $floorId)
    {
        $data = $request->all();
        // dd($data);
        $floor = floor::find($floorId);
        $floor->update($data);

        return $floor;
    }

    function destroy($floorId)
    {
        return  floor::destroy($floorId);
    }
}
