<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCards extends Component
{
    use WithPagination;

    public $search;

    // Mengatur jumlah per halaman
    public $perPage = 6;

    public function render()
    {
        $permissions = Permission::all()->groupBy('category');
        $roles = Role::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->perPage); // Menggunakan paginasi


        return view('livewire.role-cards', [
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }
}
