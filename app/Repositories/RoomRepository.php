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

    public function getAll()
    {
        $rooms = $this->room->select('rooms.id', 'rooms.name', 'rooms.status', 'rooms.category_room_id', 'rooms.manager_id', 'rooms.index', 'rooms.created_at', 'rooms.updated_at')
            ->with(['manager:id,name', 'category_room:id,name'])
            // ->where('rooms.status', Room::STATUS_ACTIVE)
            ->orderBy('rooms.index', 'asc');

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
        return $this->room->with(['manager:id,name', 'category_room:id,name'])->findOrFail($id);
    }
    public function update($data, $id)
    {
        $room = $this->room->findOrFail($id);
        return $room->update($data);
    }
    public function delete($id)
    {
        $room = $this->room->findOrFail($id);
        return $room->update(['status' => Room::STATUS_INACTIVE]);
    }
}