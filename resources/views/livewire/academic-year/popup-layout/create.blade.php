<div>
    <x-jet-dialog-modal wire:model="formAcademicYear">
        <x-slot name="title">
            Create new academic Year
        </x-slot>
        <x-slot name="content">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="inputYear"
                                   class="block text-gray-700 text-sm font-bold mb-2">Academic Year</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputYear" placeholder="Enter Academic Year" wire:model="acYear.tahun_akademik" required>
                            @error('acYear.tahun_akademik') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="chooseSemester"
                                   class="block text-gray-700 text-sm font-bold mb-2">Academic Semester</label>
                            <select wire:model="acYear.semester_akademik" required
                                    class="p-2 px-4 py-2 pr-8 w-full leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                <option value=''>Choose semester</option>
                                <option value="1">Genap</option>
                                <option value="2">Ganjil</option>
                            </select>
                            @error('acYear.tahun_akademik') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeNewAcademicYear()" wire:loading.attr="disabled">
                Close
            </x-jet-secondary-button>

            <x-success-button class="ml-2" wire:click="submitNewAcademicYear()" wire:loading.attr="disabled">
                Create
            </x-success-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
