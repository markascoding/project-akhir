@extends('admin.layout')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Daftar Jurnal</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Jurnal</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Guru</th>
                            <th>Mapel</th>
                            <th>Status</th>
                            {{-- <th>Keterangan</th> --}}
                            {{-- <th>Guru Piket</th> --}}
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Guru</th>
                            <th>Mapel</th>
                            <th>Status</th>
                            {{-- <th>Keterangan</th> --}}
                            {{-- <th>Guru Piket</th> --}}
                        </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
