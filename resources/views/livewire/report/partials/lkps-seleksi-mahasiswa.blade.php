<x-jet-dialog-modal wire:model="formGenerateStudentSelection">
    <x-slot name="title">
        Generate LKPS Student Selection
    </x-slot>

    <x-slot name="content">
        <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    <div class="mb-4">
                        <label for="selectAcademicYear"
                               class="block text-gray-700 text-sm font-bold mb-2">Select Academic Year</label>
                        <select wire:model="yearSelection"
                                class="p-2 px-4 py-2 pr-8 w-full leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                            <option value=''>Choose academic year</option>
                            @foreach($listAvailableYears as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
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

        <x-success-button class="ml-2" wire:click="submitGenerateStudentSelectionLKPS()" wire:loading.attr="disabled">
            Generate Report
        </x-success-button>
    </x-slot>
</x-jet-dialog-modal>
