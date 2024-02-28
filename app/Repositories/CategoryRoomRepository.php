<?php

namespace App\Repositories;

use App\Models\CategoryRoom;
use Yajra\DataTables\DataTables;

class CategoryRoomRepository
{
    protected $category_room;

    public function __construct(CategoryRoom $category_room)
    {
        $this->category_room = $category_room;
    }
    public function search($data)
    {
        if (isset($data['term'])) {
            return $this->category_room->where('name', 'like', '%' . $data['term'] . '%')->where('status', CategoryRoom::STATUS_ACTIVE)->get(['id', 'name']);
        }
        return $this->category_room->where('status', CategoryRoom::STATUS_ACTIVE)->limit(20)->get(['id', 'name']);
    }
    public function getAll()
    {
        $category_room = $this->category_room->query();
        return DataTables::of($category_room)
            ->addColumn('edit_url', function ($category) {
                return route('staff.locate.categoryrooms.edit', ['categoryroom' => $category]);
            })
            ->addColumn('delete_url', function ($category) {
                return route('staff.locate.categoryrooms.destroy', ['categoryroom' => $category]);
            })
            ->addColumn('created_at', function ($category) {
                return $category->created_at->format('Y-m-d H:i:s');
            })
            ->make(true);
    }
    public function create($data)
    {
        return $this->category_room->create($data);
    }

    public function find($id)
    {
        return $this->category_room->findOrFail($id);
    }

    public function update($data, $id)
    {
        $category_room =  $this->category_room->findOrFail($id);
        $category_room->update($data);
        return $category_room;
    }
    public function delete($id)
    {
        $category_room =  $this->category_room->findOrFail($id);
        $category_room->update(['status' => CategoryRoom::STATUS_INACTIVE]);
        return $category_room;
    }
}
