<div>
    <x-jet-dialog-modal wire:model="formViewBorangLokal">
        <x-slot name="title">
            College Student Form - Academic Year : @if(!empty($borangLokal->academicYear)) (<strong>{{ $borangLokal->academicYear->tahun_akademik }} {{ ($borangLokal->academicYear->semester_akademik == "1") ? "Genap" : "Ganjil" }}</strong>) @endif
        </x-slot>

        <x-slot name="content">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <table class="table-fixed w-full">
                    <tbody>
                    <tr>
                        <td class="border px-4 py-2 text-center bg-gray-500 text-white" colspan="2">Information</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Number Of Student Capacity</td>
                        <td class="border px-4 py-2 text-center">{{ $borangLokal->daya_tampung_mhs }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Number of Applicants</td>
                        <td class="border px-4 py-2 text-center">{{ $borangLokal->jumlah_calon_pendaftar }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Number of Applicants Passed the Selection</td>
                        <td class="border px-4 py-2 text-center">{{ $borangLokal->jumlah_lulus_seleksi }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Number of New Regular Students</td>
                        <td class="border px-4 py-2 text-center">{{ $borangLokal->jumlah_mahasiswa_reguler_baru }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Number of New Transfer Students</td>
                        <td class="border px-4 py-2 text-center">{{ $borangLokal->jumlah_mahasiswa_transfer_baru }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Number of Active Regular Students</td>
                        <td class="border px-4 py-2 text-center">{{ $borangLokal->jumlah_mahasiswa_reguler_aktif }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Number of Active Transfer Students</td>
                        <td class="border px-4 py-2 text-center">{{ $borangLokal->jumlah_mahasiswa_transfer_aktif }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeViewBorangMahasiswaLokal()" wire:loading.attr="disabled">
                Close
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
