<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Reporting</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <center>
                <button class="btn btn-green rounded" wire:click="makeLKPSStudentSelection()">
                    Generate LKPS Student selection
                </button>

                <button class="btn btn-green rounded" wire:click="makeLKPSForeignStudent()">
                    Generate LKPS Foreign Student
                </button>
            </center>

            <br><br>

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-10">No.</th>
                        <th class="px-4 py-2" >Nama Dokumen</th>
                        <th class="px-4 py-2" style="width: 130px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($readyDocuments as $idx => $documents)
                        <tr>
                            <td class="border px-4 py-2">{{ $idx+1 }}</td>
                            <td class="border px-4 py-2">{{ \Illuminate\Support\Str::afterLast($documents->document_path, '/') }}</td>
                            <td class="border px-4 py-2">
                                <button class="btn btn-green rounded text-sm" wire:click="downloadFile({{ $documents->id }})">
                                    Download
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="border px-4 py-2">
                                Oops, there's no data available, check back later
                            </td>
                        </tr>
                    @endforelse
                    @if($readyDocuments->hasPages())
                        <tr><td colspan="3">&nbsp;</td></tr>
                        <tr>
                            <td colspan="3">
                                {{ $readyDocuments->links() }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @if($formGenerateStudentSelection)
        @include('livewire.report.partials.lkps-seleksi-mahasiswa')
    @endif

    @if($formGenerateForeignStudent)
        @include('livewire.report.partials.lkps-mahasiswa-asing')
    @endif
</div>
