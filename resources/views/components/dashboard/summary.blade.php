<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3">
    <div class="p-6">
        <div class="flex items-center">
            <i class="fa fa-user-graduate fa-2x"></i>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laravel.com/docs">Jumlah Mahasiswa</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-2xl text-gray-500 text-center">
                {{ $summary['jumlahMahasiswaPeriode'] }}
            </div>

{{--            <a href="#">--}}
{{--                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">--}}
{{--                    <div>Lihat Detail</div>--}}

{{--                    <div class="ml-1 text-indigo-500">--}}
{{--                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <i class="fa fa-user-graduate fa-2x"></i>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laravel.com/docs">Jumlah Dosen</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-2xl text-gray-500 text-center">
                {{ $summary['jumlahDosenPeriode'] }}
            </div>

{{--            <a href="#">--}}
{{--                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">--}}
{{--                    <div>Lihat detail</div>--}}

{{--                    <div class="ml-1 text-indigo-500">--}}
{{--                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <i class="fa fa-balance-scale-left fa-2x"></i>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Rasio</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-2xl text-gray-500 text-center">
                {{ $summary['ratioSDM'] }}
            </div>
        </div>
    </div>
</div>
