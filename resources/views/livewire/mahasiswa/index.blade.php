<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <input class="shadow appearance-none border rounded w-25 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Search by Nim Mahasiswa" wire:model="searchNim">
            <br><br>
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100 text-center">
                        <th class="px-4 py-2 w-10">No.</th>
                        <th class="px-4 py-2" style="width: 260px;">NIM</th>
                        <th class="px-4 py-2" style="width: 260px;">Nama Mahasiswa</th>
                        <th class="px-4 py-2">Program Studi</th>
                        <th class="px-4 py-2">Semester terakhir</th>
                        <th class="px-4 py-2">IPK</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($listMahasiswa as $idx => $mahasiswa)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $idx + 1 }}</td>
                            <td class="border px-4 py-2">{{ $mahasiswa->nim_mahasiswa }}</td>
                            <td class="border px-4 py-2">{{ $mahasiswa->full_name }}</td>
                            <td class="border px-4 py-2">{{ $mahasiswa->program_studi }}</td>
                            <td class="border px-4 py-2">{{ $mahasiswa->detailSemester->last()->semester }}</td>
                            <td class="border px-4 py-2">{{ number_format($mahasiswa->detailSemester->average('ips'), 2, '.', '') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Ooops there's nothing here</td>
                        </tr>
                    @endforelse
                    @if($listMahasiswa->hasPages())
                        <tr><td colspan="4">&nbsp;</td></tr>
                        <tr>
                            <td colspan="4">
                                {{ $listMahasiswa->links() }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
