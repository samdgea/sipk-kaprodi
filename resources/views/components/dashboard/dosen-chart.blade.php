<div class="shadow rounded p-4 border bg-white flex-1" style="height: 300px !important;">
    <livewire:livewire-pie-chart
        key="{{ $pieChartModel->reactiveKey() }}"
        :pie-chart-model="$pieChartModel"
    />
</div>
