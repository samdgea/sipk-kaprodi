<div>
    <x-jet-dialog-modal wire:model="formBorangAsing">
        <x-slot name="title">
            Fill College Student Form - Academic Year : (<strong>{{ $acYear->tahun_akademik }} {{ ($acYear->semester_akademik == "1") ? "Ganjil" : "Genap" }}</strong>)
        </x-slot>
        <x-slot name="content">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="inputJumlahMahasiswaAktif"
                                   class="block text-gray-700 text-sm font-bold mb-2">Number of Active Students</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputJumlahMahasiswaAktif" placeholder="Enter Number of Active Students" wire:model="borangAsing.jumlah_mahasiswa_aktif" required>
                            @error('borangAsing.daya_tampung_mhs') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="inputActiveInternationalStudentFullTime"
                                   class="block text-gray-700 text-sm font-bold mb-2">Number of Full Time Foreign Students</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputActiveInternationalStudentFullTime" placeholder="Enter Number of Full Time Foreign Students" wire:model="borangAsing.jumlah_mahasiswa_asing_full_time" required>
                            @error('borangAsing.jumlah_mahasiswa_asing_full_time') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="inputActiveInternationalStudentPartTime"
                                   class="block text-gray-700 text-sm font-bold mb-2">Number of Part Time Foreign Students</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="inputActiveInternationalStudentPartTime" placeholder="Enter Number of Part Time Foreign Students" wire:model="borangAsing.jumlah_mahasiswa_asing_part_time" required>
                            @error('borangAsing.jumlah_mahasiswa_asing_part_time') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeFormBorangAsing()" wire:loading.attr="disabled">
                Close
            </x-jet-secondary-button>

            <x-success-button class="ml-2" wire:click="submitFormBorangAsing()" wire:loading.attr="disabled">
                Create
            </x-success-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
