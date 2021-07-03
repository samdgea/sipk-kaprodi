<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">User Management</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <button class="btn btn-green rounded" wire:click="createUser()">
                Add
            </button>
            <input class="shadow appearance-none border rounded w-25 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Search by Name or Email" wire:model="searchUser">
            <br><br>
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-10">No.</th>
                        <th class="px-4 py-2" style="width: 260px;">Full Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Account Status</th>
                        <th class="px-4 py-2" style="width: 180px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $idx => $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $idx+1 }}</td>
                            <td class="border px-4 py-2">{{ $user->full_name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2 text-center" style="{{ (!empty($user->deleted_at)) ? 'background-color:#000000;color:#ffffff;' : (($user->account_status) ? 'background-color:#00FF00;' : 'background-color:#FF0000; color:#FFFFFF;') }}">
                                <strong>{{  (!empty($user->deleted_at)) ? 'Deleted' : (($user->account_status) ? 'Active' : 'Disabled') }}</strong>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="inline-flex">
                                    <button class="btn btn-blue" wire:click="editUser({{ $user->id }})">
                                        Edit
                                    </button>
                                    @if(empty($user->deleted_at))
                                    <button class="btn btn-red" wire:click="deleteUser({{ $user->id }})">
                                        Delete
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border px-4 py-2">
                            Oops, there's no data available {{ (!empty($searchUser)) ? 'with that search query' : null }}
                            </td>
                        </tr>
                    @endforelse
                    @if($users->hasPages())
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr>
                            <td colspan="5">
                                {{ $users->links() }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="formUser">
        <x-slot name="title">
            User Information
        </x-slot>

        <x-slot name="content">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="inputFirstName"
                                   class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputFirstName" placeholder="Enter First Name" wire:model="user.first_name">
                            @error('user.first_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="inputLastName"
                                   class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputLastName" placeholder="Enter Last Name" wire:model="user.last_name">
                            @error('user.last_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="inputEmail"
                                   class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputEmail" placeholder="Enter Email" wire:model="user.email">
                            @error('user.email') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        @if(!$isEditUser)
                        <div class="mb-4">
                            <label for="inputPasswordPlain"
                                   class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                            <span>password</span>
                        </div>
                        @endif
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                            <select wire:model="userRole"
                                    class="p-2 px-4 py-2 pr-8 w-full leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                <option value=''>Choose a user role</option>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('userRole') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label class="inline-flex items-center mt-3">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" wire:model="user.account_status"><span class="ml-2 text-gray-700">Account Active</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeModal()" wire:loading.attr="disabled">
                Close
            </x-jet-secondary-button>

            <x-success-button class="ml-2" wire:click="submitData()" wire:loading.attr="disabled">
                {{ (!empty($user) && $user->id != null) ? 'Save Changes' : 'Create' }}
            </x-success-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
