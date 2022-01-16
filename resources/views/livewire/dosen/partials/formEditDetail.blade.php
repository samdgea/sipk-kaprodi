<x-jet-dialog-modal wire:model="formEditDetailDosen">
    <x-slot name="title">
        Detail Dosen
    </x-slot>

    <x-slot name="content">
        <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    <div class="mb-4">
                        <label for="selectAcademicYear"
                               class="block text-gray-700 text-sm font-bold mb-2">Select Academic Year</label>

                        @error('yearSelection') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="close()" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>

        <x-success-button class="ml-2" wire:click="submitEditDetailDosen()" wire:loading.attr="disabled">
            Save
        </x-success-button>
    </x-slot>
</x-jet-dialog-modal>
