<div>
    <x-jet-dialog-modal wire:model="formViewBorangAsing">
        <x-slot name="title">
            Foreign Student Form - Academic Year : @if(!empty($borangAsing->academicYear)) (<strong>{{ $borangAsing->academicYear->tahun_akademik }} {{ ($borangAsing->academicYear->semester_akademik == "1") ? "Ganjil" : "Genap" }}</strong>) @endif
        </x-slot>

        <x-slot name="content">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <table class="table-fixed w-full">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 text-center bg-gray-500 text-white" colspan="2">Information</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Number of Active Students</td>
                            <td class="border px-4 py-2 text-center">{{ $borangAsing->jumlah_mahasiswa_aktif }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Number of Full Time Foreign Students</td>
                            <td class="border px-4 py-2 text-center">{{ $borangAsing->jumlah_mahasiswa_asing_full_time }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Number of Part Time Foreign Students</td>
                            <td class="border px-4 py-2 text-center">{{ $borangAsing->jumlah_mahasiswa_asing_part_time }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeViewBorangMahasiswaAsing()" wire:loading.attr="disabled">
                Close
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
