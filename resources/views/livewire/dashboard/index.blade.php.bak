<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <div>
                <center>
                    <label for="inputYear"
                           class="block text-gray-700 text-sm font-bold mb-2">Periode</label>
                    <input type="number"
                           class="shadow appearance-none border rounded w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="inputFromYear" placeholder="From Year" wire:model="fromYear" required>
                    <input type="number"
                           class="shadow appearance-none border rounded w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="inputToYear" placeholder="From Year" wire:model="toYear" required>
                </center>
                <br>
                <center>
                    <label for="viewAsSelect"
                           class="block text-gray-700 text-sm font-bold mb-2">Model Chart</label>
                    <select wire:model="viewChart" required
                            class="p-2 px-4 py-2 pr-8 w-60 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                        <option value="column">Column Chart</option>
                        <option value="line">Line Chart</option>
                    </select>
                </center>
                <br><br>
            </div>

            <x-dashboard.chart :chartModel="$chartModel" :viewChart="$viewChart" />

            <br>

            <center>
                <div class="w-3/4">
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100 text-center">
                                <th class="px-4 py-2 w-20">Tahun</th>
                                <th class="px-4 py-2 w-48">Rasio Dosen : Mahasiswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ratioSDM as $year => $ratio)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">{{ $year }}</td>
                                    <td class="border px-4 py-2">{{ $ratio['ratio'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </center>
        </div>
    </div>
</div>
