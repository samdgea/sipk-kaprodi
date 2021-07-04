<div>
    <x-jet-dialog-modal wire:model="formBorangLokal">
        <x-slot name="title">
            Fill College Student Form - Academic Year : (<strong>{{ $acYear->tahun_akademik }} {{ ($acYear->semester_akademik == "1") ? "Ganjil" : "Genap" }}</strong>)
        </x-slot>
        <x-slot name="content">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="inputDayaTampung"
                                   class="block text-gray-700 text-sm font-bold mb-2">Student Capacity</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputDayaTampung" placeholder="Enter Student Capacity" wire:model="borangLokal.daya_tampung_mhs" required>
                            @error('borangLokal.daya_tampung_mhs') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="inputJumlahPendaftar"
                                   class="block text-gray-700 text-sm font-bold mb-2">Number of Applicants</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputJumlahPendaftar" placeholder="Enter Number of Student Applicants" wire:model="borangLokal.jumlah_calon_pendaftar" required>
                            @error('borangLokal.jumlah_calon_pendaftar') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="inputJumlahLulusSeleksi"
                                   class="block text-gray-700 text-sm font-bold mb-2">Number of Applicants Passed the Selection</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputJumlahLulusSeleksi" placeholder="Enter Number of applicants who passed the selection" wire:model="borangLokal.jumlah_lulus_seleksi" required>
                            @error('borangLokal.jumlah_lulus_seleksi') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="inputJumlahMahasiswaRegularBaru"
                                   class="block text-gray-700 text-sm font-bold mb-2">Number of New Regular Students</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputJumlahMahasiswaRegularBaru" placeholder="Enter Number of New Regular Students" wire:model="borangLokal.jumlah_mahasiswa_reguler_baru" required>
                            @error('borangLokal.jumlah_mahasiswa_reguler_baru') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="inputJumlahMahasiswaTransferBaru"
                                   class="block text-gray-700 text-sm font-bold mb-2">Number of New Transfer Students</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputJumlahMahasiswaTransferBaru" placeholder="Enter Number of New Transfer Students" wire:model="borangLokal.jumlah_mahasiswa_transfer_baru" required>
                            @error('borangLokal.jumlah_mahasiswa_transfer_baru') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="inputJumlahMahasiswaRegularAktif"
                                   class="block text-gray-700 text-sm font-bold mb-2">Number of Active Regular Students</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputJumlahMahasiswaRegularAktif" placeholder="Enter Number of Active Regular Students" wire:model="borangLokal.jumlah_mahasiswa_reguler_aktif" required>
                            @error('borangLokal.jumlah_mahasiswa_reguler_aktif') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="inputJumlahMahasiswaTransferAktif"
                                   class="block text-gray-700 text-sm font-bold mb-2">Number of Active Transfer Students</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputJumlahMahasiswaTransferAktif" placeholder="Enter Number of Active Transfer Students" wire:model="borangLokal.jumlah_mahasiswa_transfer_aktif" required>
                            @error('borangLokal.jumlah_mahasiswa_transfer_aktif') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeFormBorangLokal()" wire:loading.attr="disabled">
                Close
            </x-jet-secondary-button>

            <x-success-button class="ml-2" wire:click="submitFormBorangLokal()" wire:loading.attr="disabled">
                Create
            </x-success-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
