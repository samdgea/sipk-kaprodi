<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <script src="https://kit.fontawesome.com/ff01769f06.js" crossorigin="anonymous"></script>

        <!-- Toastr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        @livewireChartsScripts

        <script>
            toastr.options = {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                "closeButton": false,
                "progressBar": true,
                "preventDuplicates": true,
                "positionClass": "toast-top-center"
            }

            window.addEventListener('send-toast', event => {
                if (event.detail.type == "warning") {
                    toastr.warning(event.detail.message, "Warning!")
                } else if (event.detail.type == "error") {
                    toastr.error(event.detail.message, "Error!")
                } else if (event.detail.type == "success") {
                    toastr.success(event.detail.message, "Success!")
                } else {
                    toastr.info(event.detail.message, "Information")
                }
            })

            $(document).ready(function () {
                $('#go-to-top').each(function(){
                    $(this).click(function(){
                        $('html,body').animate({ scrollTop: 0 }, 'slow');
                        return false;
                    });
                });
            })
        </script>
    </body>
</html>
