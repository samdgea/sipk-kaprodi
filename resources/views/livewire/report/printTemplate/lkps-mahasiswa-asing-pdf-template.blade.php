<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Borang Mahasiswa Asing</title>

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
                        <i class="fa fa-globe"></i> Mahasiswa Asing
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
                                <th scope="col" rowspan="2" class="text-center vertical-center">NO</th>
                                <th scope="col" rowspan="2" class="text-center vertical-center">Program Studi</th>
                                <th scope="col" colspan="3" class="text-center vertical-center">Jumlah Mahasiswa Aktif</th>
                                <th scope="col" colspan="3" class="text-center">Jumlah Mahasiswa Asing Penuh Waktu</th>
                                <th scope="col" colspan="3" class="text-center">Jumlah Mahasiswa Asing Paruh Waktu</th>
                            </tr>
                            <tr class="text-center">
                                <th scope="col" class="text-center">{{ $datas[2]->academicYear->tahun_akademik . '-' . $datas[2]->academicYear->semester_akademik }}</th>
                                <th scope="col" class="text-center">{{ $datas[1]->academicYear->tahun_akademik . '-' . $datas[1]->academicYear->semester_akademik }}</th>
                                <th scope="col" class="text-center">{{ $datas[0]->academicYear->tahun_akademik . '-' . $datas[0]->academicYear->semester_akademik }}</th>
                                <th scope="col" class="text-center">{{ $datas[2]->academicYear->tahun_akademik . '-' . $datas[2]->academicYear->semester_akademik }}</th>
                                <th scope="col" class="text-center">{{ $datas[1]->academicYear->tahun_akademik . '-' . $datas[1]->academicYear->semester_akademik }}</th>
                                <th scope="col" class="text-center">{{ $datas[0]->academicYear->tahun_akademik . '-' . $datas[0]->academicYear->semester_akademik }}</th>
                                <th scope="col" class="text-center">{{ $datas[2]->academicYear->tahun_akademik . '-' . $datas[2]->academicYear->semester_akademik }}</th>
                                <th scope="col" class="text-center">{{ $datas[1]->academicYear->tahun_akademik . '-' . $datas[1]->academicYear->semester_akademik }}</th>
                                <th scope="col" class="text-center">{{ $datas[0]->academicYear->tahun_akademik . '-' . $datas[0]->academicYear->semester_akademik }}</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr class="text-center">
                                    <th scope="row" class="text-center">1</th>
                                    <th scope="row" class="text-center">Teknik Informatika</th>
                                    <th scope="col" class="text-center">{{ $datas[2]->jumlah_mahasiswa_aktif }}</th>
                                    <th scope="col" class="text-center">{{ $datas[1]->jumlah_mahasiswa_aktif }}</th>
                                    <th scope="col" class="text-center">{{ $datas[0]->jumlah_mahasiswa_aktif }}</th>
                                    <th scope="col" class="text-center">{{ $datas[2]->jumlah_mahasiswa_asing_full_time }}</th>
                                    <th scope="col" class="text-center">{{ $datas[1]->jumlah_mahasiswa_asing_full_time }}</th>
                                    <th scope="col" class="text-center">{{ $datas[0]->jumlah_mahasiswa_asing_full_time }}</th>
                                    <th scope="col" class="text-center">{{ $datas[2]->jumlah_mahasiswa_asing_part_time }}</th>
                                    <th scope="col" class="text-center">{{ $datas[1]->jumlah_mahasiswa_asing_part_time }}</th>
                                    <th scope="col" class="text-center">{{ $datas[0]->jumlah_mahasiswa_asing_part_time }}</th>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </body>
</html>
