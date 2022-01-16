<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <input class="shadow appearance-none border rounded w-25 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Search by Nama Dosen" wire:model="searchDosen">

            <br><br>
            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-100 text-center">
                    <th class="px-4 py-2 w-10">No.</th>
                    <th class="px-4 py-2" style="width: 260px;">Full Name</th>
                    <th class="px-4 py-2" style="width: 260px;">Email Address</th>
                    <th class="px-4 py-2">Phone Number</th>
                    <th class="px-4 py-2">Home Number</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($listDosen as $idx => $dosen)
                    <tr class="text-center">
                        <td class="border px-4 py-2">{{ $idx + 1 }}</td>
                        <td class="border px-4 py-2">{{ $dosen->full_name }}</td>
                        <td class="border px-4 py-2">{{ (!empty($dosen->dosenDetail)) ? $dosen->dosenDetail->email_address : '-' }}</td>
                        <td class="border px-4 py-2">{{ (!empty($dosen->dosenDetail)) ? $dosen->dosenDetail->phone_number : '-' }}</td>
                        <td class="border px-4 py-2">{{ (!empty($dosen->dosenDetail)) ? $dosen->dosenDetail->home_number : '-' }}</td>
                        <td class="border px-4 py-2"></td>
                    </tr>
                @empty
                    <tr>
                        <td class="border px-4 py-2" colspan="4">Ooops there's nothing here</td>
                    </tr>
                @endforelse
                @if($listDosen->hasPages())
                    <tr><td colspan="4">&nbsp;</td></tr>
                    <tr>
                        <td colspan="4">
                            {{ $listDosen->links() }}
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

    @if($formEditDetailDosen)
        @include('livewire.dosen.partials.formEditDetail')
    @endif

</div>
