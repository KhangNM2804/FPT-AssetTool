<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UserRepository
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function search($data)
    {
        if (isset($data['term'])) {
            return $this->user->where('name', 'like', '%' . $data['term'] . '%')->get(['id', 'name','email']);
        }
        return $this->user->limit(20)->get(['id', 'name','email']);
    }
    public function datatables()
    {
        $users = $this->user->query();
        return DataTables::of($users)
            ->addColumn('role_name', function ($user) {
                return $user->roles()->pluck('name')->first();
            })
            ->addColumn('edit_url', function ($user) {
                return route('staff.users.users.edit', ['user' => $user]);
            })
            ->make(true);
    }
    public function find($id)
    {
        $user = $this->user->findOrFail($id);
        $user->role_name = $user->roles()->pluck('name')->first();
        return $user;
    }
    public function updateRole($id, $data)
    {
        if ($id == Auth::user()->id) {
            toastr('Không thể cấp quyền cho bản thân', 'error', 'Thất bại');
            return;
        }
        $user = $this->user->findOrFail($id);
        toastr('Cập nhật thành công', 'success', 'Thành công');
        return $user->syncRoles([$data['role']]);
    }
}
