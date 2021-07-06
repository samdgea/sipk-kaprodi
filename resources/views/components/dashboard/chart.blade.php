<div class="shadow rounded p-4 border bg-white flex-1" style="height: 300px !important;">
    @if($viewChart == 'column')
        <livewire:livewire-column-chart
            key="{{ $chartModel->reactiveKey() }}"
            :column-chart-model="$chartModel"
        />
    @else
        <livewire:livewire-line-chart
            key="{{ $chartModel->reactiveKey() }}"
            :line-chart-model="$chartModel"
        />
    @endif
</div>
