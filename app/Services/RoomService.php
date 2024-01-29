<?php

namespace App\Services;

use App\Repositories\RoomRepository;

class RoomService
{
    protected $roomRepository;
    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function getAllRoomsService()
    {
        return $this->roomRepository->getAll();
    }

    public function storeRoomService($data)
    {
        return $this->roomRepository->store($data);
    }

    public function findRoomService($id)
    {
        return $this->roomRepository->find($id);
    }

    public function updateRoomService($data, $id)
    {
        return $this->roomRepository->update($data, $id);
    }
    public function deleteRoomService($id)
    {
        return $this->roomRepository->delete($id);
    }
    public function searchRoomService($data)
    {
        return $this->roomRepository->search($data);
    }
}
