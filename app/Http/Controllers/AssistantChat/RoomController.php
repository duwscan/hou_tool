<?php

namespace App\Http\Controllers\AssistantChat;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return $this->sendResponse($rooms, 'Rooms retrieved successfully.');
    }

    public function store(RoomRequest $request)
    {

    }

    public function show(Room $room)
    {
        return $room;
    }

    public function update(RoomRequest $request, Room $room)
    {
        $room->update($request->validated());

        return $room;
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return response()->json();
    }
}
