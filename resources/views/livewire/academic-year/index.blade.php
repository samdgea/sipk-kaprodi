<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <button class="btn btn-green rounded text-sm" wire:click="createNewAcademicYear()">
                Add new Academic Year
            </button>
            <input class="shadow appearance-none border rounded w-25 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Search by Year" wire:model="searchYear">
            <br><br>
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100 text-center">
                        <th class="px-4 py-2 w-10">No.</th>
                        <th class="px-4 py-2" style="width: 260px;">Academic Year</th>
                        <th class="px-4 py-2" style="width: 260px;">Semester</th>
                        <th class="px-4 py-2">Form Status</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($academicYear as $idx => $acYear)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $idx+1 }}</td>
                            <td class="border px-4 py-2">{{ $acYear->tahun_akademik }}</td>
                            <td class="border px-4 py-2">{{ ($acYear->semester_akademik == 1) ? 'Genap' : 'Ganjil' }}</td>
                            <td class="border px-4 py-2 {{ (!empty($acYear->borangMahasiswaLokal) && !empty($acYear->borangMahasiswaAsing)) ? 'bg-green-500' : 'bg-yellow-500' }}"><strong>{{ (!empty($acYear->borangMahasiswaLokal) && !empty($acYear->borangMahasiswaAsing)) ? 'Filled' : ((empty($acYear->borangMahasiswaLokal) && empty($acYear->borangMahasiswaAsing)) ? 'Not Filled' : 'Not Filled or Partially Filled') }}</strong></td>
                            <td class="border px-4 py-2">
                                <div class="inline-flex">
                                    @if(empty($acYear->borangMahasiswaLokal))
                                        <button class="btn btn-blue text-xs" wire:click="createNewBorangMahasiswaLokal({{ $acYear->id }})">
                                            Mahasiswa Lokal
                                        </button>
                                    @else
                                        <button class="btn btn-green text-xs" wire:click="viewBorangMahasiswaLokal({{ $acYear->id }})">
                                            <i class="fa fa-search"></i> Lokal
                                        </button>
                                    @endif
                                    @if(empty($acYear->borangMahasiswaAsing))
                                        <button class="btn btn-blue text-xs" wire:click="createNewBorangMahasiswaAsing({{ $acYear->id }})">
                                            Mahasiswa Asing
                                        </button>
                                    @else
                                        <button class="btn btn-green text-xs" wire:click="viewBorangMahasiswaAsing({{ $acYear->id }})">
                                            <i class="fa fa-search"></i> Asing
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border px-4 py-2" colspan="5">Ooops there's nothing here</td>
                        </tr>
                    @endforelse
                    @if($academicYear->hasPages())
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr>
                            <td colspan="5">
                                {{ $academicYear->links() }}
                            </td>
                        </tr>
                @endif
            </table>
        </div>
    </div>

    @if($formAcademicYear)
        @include('livewire.academic-year.popup-layout.create')
    @endif

    @if($formBorangLokal)
        @include('livewire.academic-year.popup-layout.create-borang-lokal')
    @endif

    @if($formBorangAsing)
        @include('livewire.academic-year.popup-layout.create-borang-asing')
    @endif

    @if($formViewBorangLokal)
        @include('livewire.academic-year.popup-layout.view-borang-lokal')
    @endif

    @if($formViewBorangAsing)
        @include('livewire.academic-year.popup-layout.view-borang-asing')
    @endif
</div>
