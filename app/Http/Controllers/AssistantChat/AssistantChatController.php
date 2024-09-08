<?php

namespace App\Http\Controllers\AssistantChat;

use App\Dto\AssistantMsgDto;
use App\Dto\RoomDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\assistantMsgRequest;
use App\Models\assistantMsg;
use App\Models\Room;
use function Pest\Laravel\get;

class AssistantChatController extends Controller
{
    public function index()
    {
        $rooms= Room::with('user_id')->get()->map(fn(Room $room) => $this->roomToDto($room));
        return $this->sendResponse($rooms, 'Rooms retrieved successfully.');
    }

    public function store( Room $room,AssistantMsgRequest $request)
    {

        return $this->sendResponse(AssistantMsg::create($request->validated()), 'Send msg successfully.');
    }

    public function getMessagesInRoom(Room $room)
    {
        $assistant_msgs = $room->assistantMsgs()->get()->map(fn(assistantMsg $assistant_msg) => $this->assistantMsgToDto($assistant_msg));
        return $this->sendResponse($assistant_msgs, 'Messages retrieved successfully.');
    }

    private function roomToDto(Room $room)
    {
        return new RoomDto($room);
    }

    private function assistantMsgToDto(AssistantMsg $assistant_msg)
    {
        return new AssistantMsgDto($assistant_msg);
    }
}
