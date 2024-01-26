<?php

namespace App\Repositories;

use App\Models\Handover;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HandoverRepository
{
    protected $user;

    protected function getUser()
    {
        if (!$this->user) {
            $this->user = User::with('handovers')->findOrFail(Auth::user()->id);
        }
        return $this->user;
    }


    public function create($data)
    {
        $user = $this->getUser();
        return $user->handovers()->create($data);
    }
    public function save($room_id)
    {
        $user = $this->getUser();
        $user->handovers()->update(['room_id', $room_id]);
        return $this->deleteAll();
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
}
