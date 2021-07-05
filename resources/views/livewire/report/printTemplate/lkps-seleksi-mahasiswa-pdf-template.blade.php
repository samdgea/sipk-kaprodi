<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Borang Seleksi Mahasiswa</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <script src="https://kit.fontawesome.com/ff01769f06.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style type="text/css">
            .page-header {
                margin: 10px 0 20px 0;
                font-size: 22px;
            }

            .vertical-center {
                vertical-align: middle !important;
            }

            .invoice {
                position: relative;
                background: #fff;
                border: 1px solid #f4f4f4;
                padding: 20px;
                margin: 10px 25px;
            }

            .page-header>small {
                color: #666;
                display: block;
                margin-top: 5px;
            }
        </style>
    </head>
    <body>
        <section class="invoice">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Seleksi Mahasiswa
                        <small>Periode : {{ $datas->first()->academicYear->tahun_akademik }} - {{ $datas->last()->academicYear->tahun_akademik }}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="text-center vertical-center">Tahun Akademik</th>
                                <th scope="col" rowspan="2" class="text-center vertical-center">Daya Tampung</th>
                                <th scope="col" colspan="2" class="text-center">Jumlah Calon Mahasiswa</th>
                                <th scope="col" colspan="2" class="text-center">Jumlah Mahasiswa Baru</th>
                                <th scope="col" colspan="2" class="text-center">Jumlah Mahasiswa Aktif</th>
                            </tr>
                            <tr class="text-center">
                                <th scope="col" class="text-center">Pendaftar</th>
                                <th scope="col" class="text-center">Lulus Seleksi</th>
                                <th scope="col" class="text-center">Reguler</th>
                                <th scope="col" class="text-center">Transfer</th>
                                <th scope="col" class="text-center">Reguler</th>
                                <th scope="col" class="text-center">Transfer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                                <tr class="text-center">
                                    <th scope="row" class="text-center">{{ $data->academicYear->tahun_akademik . ' - ' . $data->academicYear->semester_akademik }}</th>
                                    <th class="text-center">{{ $data->daya_tampung_mhs }}</th>
                                    <th class="text-center">{{ $data->jumlah_calon_pendaftar }}</th>
                                    <th class="text-center">{{ $data->jumlah_lulus_seleksi }}</th>
                                    <th class="text-center">{{ $data->jumlah_mahasiswa_reguler_baru }}</th>
                                    <th class="text-center">{{ $data->jumlah_mahasiswa_transfer_baru }}</th>
                                    <th class="text-center">{{ $data->jumlah_mahasiswa_reguler_aktif }}</th>
                                    <th class="text-center">{{ $data->jumlah_mahasiswa_transfer_aktif }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </body>
</html>
