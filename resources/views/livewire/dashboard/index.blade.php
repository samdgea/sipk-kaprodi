<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <div class="float-right">
            <x-jet-secondary-button id="triggerHiddenButton">
                <i class="fa fa-cogs fa-2x"></i>
            </x-jet-secondary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Statistik Mahasiswa dan Dosen</h2>
            <span class="text-sm">Periode {{ $filterConfiguration['filterRange']['fromYear'] }} {{ $filterConfiguration['filterRange']['toYear'] }}</span>
        </div>

        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-dashboard.summary :summary="$summary"/>
            </div>
        </div>

        @if($filterConfiguration['showCharts'])
        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-dashboard.chart :viewChartType="$filterConfiguration['viewChart']" :chartModel="$chartModel" />
            </div>
        </div>
        @endif

        <div class="hidden">
            <x-jet-secondary-button wire:click="showFilterModal()" id="clickShowFilter">
                Show/Hide Filter
            </x-jet-secondary-button>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="dashboardFilter">
        <x-slot name="title">
            Dashboard Filter
        </x-slot>

        <x-slot name="content">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="inputPeriode"
                                   class="block text-gray-700 text-sm font-bold mb-2">Periode</label>
                            <center>
                                <input type="number"
                                       class="shadow appearance-none border rounded w-60 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       id="inputPeriode" placeholder="Please enter Year range" wire:model="filterConfiguration.filterRange.fromYear">
                                <input type="number"
                                       class="shadow appearance-none border rounded w-60 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       id="inputPeriode" placeholder="Please enter Year range" wire:model="filterConfiguration.filterRange.toYear">
                            </center>
                        </div>
                        <div class="mb-4">
                            <label for="showCharts" class="block text-gray-700 text-sm font-bold mb-2">
                                <input id="showCharts" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent" wire:model="filterConfiguration.showCharts">
                                Show Charts
                            </label>
                        </div>
                        <div class="mb-4 {{ (!$filterConfiguration['showCharts']) ? 'hidden' : null }}">
                            <label for="viewAsSelect"
                                   class="block text-gray-700 text-sm font-bold mb-2">Model Chart</label>
                            <center>
                                <select wire:model="filterConfiguration.viewChart" required
                                        class="p-2 px-4 py-2 pr-8 w-full leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                    <option value="column">Column Chart</option>
                                    <option value="line">Line Chart</option>
                                </select>
                            </center>
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeFilterModal()" wire:loading.attr="disabled">
                Close
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

@push("scripts")
    <script>
        $(document).ready(function() {
            $('#triggerHiddenButton').click(function () {
                $('#clickShowFilter').click();
            });
        });
    </script>
@endpush
