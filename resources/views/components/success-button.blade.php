<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-green rounded focus:outline-none transition']) }}>
    {{ $slot }}
</button>
