<?php

namespace App\Repositories;

use App\Models\Location;
use App\Models\Room;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class RoomRepository
{
    protected $room;
    protected $gate;

    public function __construct(Room $room, GateContract $gate)
    {
        $this->room = $room;
        $this->gate = $gate;
    }
    public function search($data)
    {
        if (isset($data['term'])) {
            return $this->room->with(['manager:id,name'])->where('name', 'like', '%' . $data['term'] . '%')->where('status', Room::STATUS_ACTIVE)->get(['id', 'name', 'manager_id']);
        }
        return $this->room->with(['manager:id,name'])->where('status', Room::STATUS_ACTIVE)->limit(10)->get(['id', 'name', 'manager_id']);
    }
    public function getAll()
    {
        $rooms = $this->room->select('rooms.id', 'rooms.name', 'rooms.status', 'rooms.category_room_id', 'rooms.manager_id', 'rooms.index', 'rooms.created_at', 'rooms.updated_at')
            ->with(['manager:id,name', 'category_room:id,name'])
            ->orderBy('rooms.index', 'asc');
        return DataTables::of($rooms)
            ->addColumn('created_at', function ($room) {
                return $room->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('updated_at', function ($room) {
                return $room->updated_at->format('Y-m-d H:i:s');
            })
            ->addColumn('edit_url', function ($room) {
                if ($this->gate->allows('update', $room)) {
                    return route('staff.locate.rooms.edit', ['room' => $room]);
                } else {
                    return null;
                }
            })
            ->addColumn('delete_url', function ($room) {
                if ($this->gate->allows('delete', $room)) {
                    if($room->status == Room::STATUS_ACTIVE){
                        return route('staff.locate.rooms.destroy', ['room' => $room]);
                    }
                    return null;
                    
                } else {
                    return null;
                }
            })
            ->addColumn('show_url', function ($room) {
                return route('staff.locate.rooms.show', ['room' => $room]);
            })
            ->make(true);
    }

    public function store($data)
    {
        return $this->room->create($data);
    }
    public function show($id)
    {
        return $this->room->with(['manager:id,name', 'category_room:id,name', 'assetDetails.asset'])->findOrFail($id);
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
        toastr('Xóa phòng thành công', 'success', 'Thành công');
        return $room->update(['status' => Room::STATUS_INACTIVE]);
    }
}
