<?php

namespace App\Repositories;

use App\Models\CategoryRoom;

class CategoryRoomRepository
{
    protected $category_room;
    
    public function __construct(CategoryRoom $category_room)
    {
        $this->category_room = $category_room;
    }
}
