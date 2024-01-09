<?php

namespace App\Repositories;

use App\Models\Location;
use App\Models\Room;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class RoomRepository
{
    protected $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    public function getRooms()
    {
        $rooms = Room::with(['user', 'manager'])->where('status', Room::STATUS_ACTIVE)->orderBy('index', 'asc');
        return DataTables::of($rooms)
            ->addColumn('created_at', function ($room) {
                return $room->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('updated_at', function ($room) {
                return $room->updated_at->format('Y-m-d H:i:s');
            })
            ->addColumn('edit_url', function ($room) {
                return route('staff.rooms.edit', ['room' => $room]);
            })
            ->addColumn('delete_url', function ($room) {
                return route('staff.rooms.destroy', ['room' => $room]);
            })
            ->make(true);
    }

    public function store($data)
    {
        return $this->room->create($data);
    }
    public function find($id)
    {
        return $this->room->findOrFail($id);
    }
    public function update($data, $id)
    {
        $room = $this->room->findOrFail($id);
        return $room->update($data);
    }
    public function deleteRoom($id)
    {
        $room = $this->room->findOrFail($id);
        return $room->update(['status' => Room::STATUS_INACTIVE]);
    }
}
