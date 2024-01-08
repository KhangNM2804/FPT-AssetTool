<?php

namespace App\Repositories;

use App\Models\Location;
use App\Models\Room;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class RoomRepository
{

    public function getRooms()
    {
        $rooms = Room::with(['user', 'location' => function ($query) {
            $query->where('id', Session::get('locationSession'));
        }])->where('status', Room::STATUS_ACTIVE)->orderBy('index', 'asc');
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

    public function storeRoom($data)
    {
        $location = Location::findOrFail(Session::get('locationSession'));
        return $location->rooms()->create($data);
    }
    public function findRoom($id)
    {
        $location = Location::findOrFail(Session::get('locationSession'));
        $room = $location->rooms()->findOrFail($id);
        return $room;
    }
    public function updateRoom($data, $id)
    {
        $location = Location::findOrFail(Session::get('locationSession'));
        return $location->rooms()->where('id', $id)->update(['name' => $data['name'], 'index' => $data['index']]);
    }
    public function deleteRoom($id)
    {
        $location = Location::findOrFail(Session::get('locationSession'));
        return $location->rooms()->where('id', $id)->update(['status' => Room::STATUS_INACTIVE]);
    }
}
