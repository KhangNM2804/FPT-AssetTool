<?php

namespace App\Repositories;

use App\Models\Handover;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HandoverRepository
{
    protected $user;


    protected function getUser()
    {
        if (!$this->user) {
            $this->user = User::with(['handovers', 'handovers.assetDetail', 'handovers.assetDetail.asset'])->findOrFail(Auth::user()->id);
        }
        return $this->user;
    }

    public function create($data)
    {
        $user = $this->getUser();
        return $user->handovers()->create($data);
    }
    public function save($data)
    {
        $user = $this->getUser();
        $room = Room::findOrFail($data['room_id']);
        $user->handovers->each(function ($handover) use ($data, $room) {
            $handover->assetDetail->update(['room_id' => $data['room_id'], 'receiver_id' => $room->id]);
        });
        $this->deleteAll();
        $this->user->room = $room->name;
        return $this->user;
    }
    
    public function delete($id)
    {
        $user = $this->getUser();
        return $user->handovers()->where('id', $id)->delete();
    }

    public function deleteAll()
    {
        $user = $this->getUser();
        return $user->handovers()->delete();
    }

    public function countHandover()
    {
        $user = $this->getUser();
        return $user->handovers()->count();
    }
}
