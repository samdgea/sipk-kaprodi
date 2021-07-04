<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Activity logs</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-10">No.</th>
                        <th class="px-4 py-2" style="width: 260px;">Action Type</th>
                        <th class="px-4 py-2">Table</th>
                        <th class="px-4 py-2">Time</th>
                        <th class="px-4 py-2" style="width: 180px;">Done By</th>
                        <th class="px-4 py-2" style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $idx => $log)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $idx+1 }}</td>
                            @if($log->log_type != "login")
                                <td class="border px-4 py-2">{{ $log->log_type }}</td>
                                <td class="border px-4 py-2">{{ $log->table_name }}</td>
                            @else
                                <td class="border px-4 py-2">{{ $log->log_type }}</td>
                                <td class="border px-4 py-2">-</td>
                            @endif
                            <td class="border px-4 py-2">{{ $log->date_humanize }}</td>
                            <td class="border px-4 py-2">{{ $log->user->full_name }}</td>
                            <td class="border px-4 py-2">
                                <div class="inline-flex">
                                    <button class="btn btn-blue text-xs" wire:click="viewLog({{ $log->id }})">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border px-4 py-2" colspan="6">Ooops there's nothing here</td>
                        </tr>
                    @endforelse
                    @if($logs->hasPages())
                        <tr><td colspan="6">&nbsp;</td></tr>
                        <tr>
                            <td colspan="6">
                            {{ $logs->links() }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="logDetail">
        <x-slot name="title">
            Log Information
        </x-slot>

        <x-slot name="content">
            @if (!empty($logData) && $logDetail)
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <table class="table-fixed w-full">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 text-center bg-gray-500 text-white" colspan="2"><strong>Info</strong></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Type</td>
                            <td class="border px-4 py-2">{{ $logData->log_type }}</td>
                        </tr>
                        @if($logData->log_type != "login")
                            <tr>
                                <td class="border px-4 py-2">Table</td>
                                <td class="border px-4 py-2">{{ $logData->table_name }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td class="border px-4 py-2">Time</td>
                            <td class="border px-4 py-2">{{ $logData->date_humanize }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Done By</td>
                            <td class="border px-4 py-2">{{ $logData->user->full_name }}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table class="table-fixed w-full">
                    <tbody>
                        @if($logData->log_type != "login")
                            <tr>
                                <td class="border px-4 py-2 text-center bg-gray-500 text-white"><strong>Field</strong></td>
                                <td class="border px-4 py-2 text-center bg-gray-500 text-white"><strong>Previous</strong></td>
                                <td class="border px-4 py-2 text-center bg-gray-500 text-white"><strong>Current</strong></td>
                            </tr>
                            @foreach($differenceData['editHistory'] as $column => $value)
                                <tr>
                                    <td class="border px-4 py-2">{{ $column }}</td>
                                    <td class="border px-4 py-2">{{ \Illuminate\Support\Str::limit($value, 15) }}</td>
                                    <td class="border px-4 py-2 {{ ($differenceData['currentData']->$column != $value) ? 'bg-red-100' : null  }}">{{ \Illuminate\Support\Str::limit($differenceData['currentData']->$column, 15) }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="border px-4 py-2 text-center bg-gray-500 text-white" colspan="2"><strong>Details</strong></td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">Accessed from IP</td>
                                <td class="border px-4 py-2">{{ $logData->json_data['ip'] }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">Browser Information</td>
                                <td class="border px-4 py-2">{{ $logData->json_data['user_agent'] }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeModal()" wire:loading.attr="disabled">
                Close
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
