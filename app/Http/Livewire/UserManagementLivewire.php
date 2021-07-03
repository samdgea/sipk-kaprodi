<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserManagementLivewire extends Component
{
    use WithPagination;

    public $searchUser;
    public $roles;

    public $isEditUser;
    public $formUser;
    public User $user;
    public $userRole;

    protected $rules = [
        'user.first_name' => 'required|string|max:50',
        'user.last_name' => 'nullable|string|max:50',
//        'user.password' => 'sometimes|required|max:50',
        'user.email' => 'required|email|unique:users',
        'user.account_status' => 'boolean',
        'userRole' => 'required|string'
    ];

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $this->roles = Role::get()->pluck('name', 'id');

        if (!empty($this->searchUser) && Str::length($this->searchUser) >= 3) {
            $user = User::where('first_name', 'like', '%' . $this->searchUser . '%')
                        ->orWhere('last_name', 'like', '%' . $this->searchUser . '%')
                        ->orWhere('email', 'like', '%' . $this->searchUser . '%')
                        ->paginate(5);
        } else {
            $user = User::paginate(5);
        }

        return view('livewire.user-management.index', [
            'users' => $user
        ]);
    }

    public function createUser()
    {
        $this->user = new User();
        $this->openModal();
    }

    public function editUser($id) {
        $this->isEditUser = true;
        $this->user = User::find($id);
        $this->userRole = $this->user->getRoleNames()->first();

        if (empty($this->user)) {
            $this->dispatchBrowserEvent('send-toast', [
                "type" => "error",
                "message" => "User tersebut tidak ada atau sudah dihapus"
            ]);
            return;
        }
        $this->openModal();
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();

        $this->dispatchBrowserEvent('send-toast', [
            "type" => "success",
            "message" => 'Success deleting user'
        ]);

    }

    public function submitData() {
        if (!$this->isEditUser) $this->user->password = Hash::make("password");
        $this->user->save();
        $this->user->syncRoles($this->userRole);

        $this->dispatchBrowserEvent('send-toast', [
            "type" => "success",
            "message" => (!empty($this->user->id)) ? 'Success modify user information' : 'Success create new user'
        ]);

        $this->closeModal();
    }

    public function closeModal() {
        $this->formUser = false;
        $this->clearData();
    }

    private function openModal() {
        $this->formUser = true;
    }

    private function clearData() {
        $this->user = new User;
        $this->isEditUser = null;
        $this->userRole = null;
    }

    public function testFireEvent() {
        $this->dispatchBrowserEvent('send-toast', [
            "type" => "info",
            "message" => "Ini adalah test"
        ]);
    }
}
