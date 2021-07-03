<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <x-dashboard.mahasiswa-chart :pieChartModel="$pieChartMahasiswa" />
            <br>
            <x-dashboard.dosen-chart :pieChartModel="$pieChartDosen" />
        </div>
    </div>
</div>
