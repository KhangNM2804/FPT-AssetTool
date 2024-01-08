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

    public function getRoomsService()
    {
        return $this->roomRepository->getRooms();
    }

    public function storeRoomService($data)
    {
        return $this->roomRepository->storeRoom($data);
    }

    public function findRoomService($id)
    {
        return $this->roomRepository->findRoom($id);
    }

    public function updateRoomService($data, $id)
    {
        return $this->roomRepository->updateRoom($data, $id);
    }
    public function deleteRoomService($id)
    {
        return $this->roomRepository->deleteRoom($id);
    }
}
