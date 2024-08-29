@extends('piket.layout')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Daftar Jurnal Piket</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <div class="btn-group mb-2">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-plus"></i> <span>Tambah Data</span>
        </button>
    </div>

    <!-- DataTales Example -->
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
                            <th>Mata Pelajaran</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($journals as $jurnal-p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jurnal-p->nama_kelas }}</td>
                                <td>{{ $jurnal-p->jp_mulai }}</td>
                                <td>{{ $jurnal-p->jp_selesai }}</td>
                                <td>{{ $jurnal-p->nama_guru }}</td>
                                <td>{{ $jurnal-p->mata_pelajaran }}</td>
                                <td>{{ $jurnal-p->status }}</td>
                                <td>{{ $jurnal-p->keterangan }}</td>
                                <td class="d-lg-flex gap-2 ">

                                    <button type="button" class="btn btn-sm btn-warning btn-edit"
                                        data-id="{{ $jurnal-p->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button data-id="{{ $jurnal-p->id }}" type="button" data-toggle="modal"
                                        data-target="#modal-default" class="btn btn-danger btn-sm btn-delete"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal tambah data -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jurnal Piket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('JournalP.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_kelas">Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas">
                        </div>
                        <div class="mb-3">
                            <label for="jp_mulai">Jam Mulai</label>
                            <input type="text" name="jp_mulai" class="form-control" placeholder="Jam Mulai">
                        </div>
                        <div class="mb-3">
                            <label for="jp_selesai">Jam Selesai</label>
                            <input type="text" name="jp_selesai" class="form-control" placeholder="Jam Selesai">
                        </div>
                        <div class="mb-3">
                            <label for="nama_guru">Guru</label>
                            <input type="text" name="nama_guru" class="form-control" placeholder="Guru">
                        </div>
                        <div class="mb-3">
                            <label for="mata_pelajaran">Mata Pelajaran</label>
                            <input type="text" name="mata_pelajaran" class="form-control" placeholder="Mapel">
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <input type="text" name="status" class="form-control" placeholder="Status">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal tambah data -->
    <!-- Modal ubah data -->
    <div class="modal fade" id="modal-ubah" tabindex="-1" aria-labelledby="modal-ubah" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Ubah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="update">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="nama_kelas">Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" id="nama_kelas"
                                placeholder="nama kelas">
                        </div>
                        <div class="mb-3">
                            <label for="jp_mulai">Jam Mulai</label>
                            <input type="text" name="jp_mulai" class="form-control" id="jam_mulai"
                                placeholder="jam mulai">
                        </div>
                        <div class="mb-3">
                            <label for="jp_selesai">Jam Selesai</label>
                            <input type="text" name="jp_selesai" class="form-control" id="jam_selesai"
                                placeholder="jam selesai">
                        </div>
                        <div class="mb-3">
                            <label for="nama_guru">Guru</label>
                            <input type="text" name="nama_guru" class="form-control" id="guru"
                                placeholder="guru">
                        </div>
                        <div class="mb-3">
                            <label for="mata_pelajaran">Mata Pelajaran</label>
                            <input type="text" name="mata_pelajaran" class="form-control" id="mapel"
                                placeholder="mata pelajaran">
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <input type="text" name="status" class="form-control" id="status"
                                placeholder="status">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="keterangan"
                                placeholder="keterangan"></textarea>

                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> --}}
                    <button type="button" class="btn btn-primary btn-update">Ubah</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- end modal ubah data -->

    <!-- modal hapus  -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-delete" action="" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <!-- end modal hapus  -->


@endsection
@push('js')
    <script>
        $('.btn-delete').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ route('JournalP.destroy', ':id') }}".replace(':id', id);
            $('#form-delete').attr('action', url);
        });
    </script>
    <script>
        $('.btn-edit').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ route('JournalP.edit', ':id') }}".replace(':id', id);
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('#modal-ubah').modal('show');
                    $('#modal-ubah').find('#id').val(data.id);
                    $('#modal-ubah').find('#nama_kelas').val(data.nama_kelas);
                    $('#modal-ubah').find('#jp_mulai').val(data.jp_mulai);
                    $('#modal-ubah').find('#jp_selesai').val(data.jp_selesai);
                    $('#modal-ubah').find('#nama_guru').val(data.nama_guru);
                    $('#modal-ubah').find('#mata_pelajaran').val(data.mata_pelajaran);
                    $('#modal-ubah').find('#status').val(data.status);
                    $('#modal-ubah').find('#keterangan').val(data.keterangan);
                }

            });

        });
    </script>
    <script>
        $('.btn-update').click(function(e) {
            e.preventDefault();

            let id = $('#id').val();
            let nama_kelas = $('#nama_kelas').val();
            let jp_mulai = $('#jp_mulai').val();
            let jp_selesai = $('#jp_selesai').val();
            let nama_guru = $('#nama_guru').val();
            let mata_pelajaran = $('#mata_pelajaran').val();
            let status = $('#status').val();
            let keterangan = $('#keterangan').val();
            let token = $("meta[name='csrf-token']").attr("content");
            var url = "{{ route('JournalP.update', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'PUT',
                data: {
                    "id": id,
                    "nama_kelas": nama_kelas,
                    "jp_mulai": jp_mulai,
                    "jp_selesai": jp_selesai,
                    "nama_guru": nama_guru,
                    "mata_pelajaran": mata_pelajaran,
                    "status": status,
                    "keterangan": keterangan,
                    "_token": token
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil',
                        text: response.message,
                        icon: 'success',
                        timer: 10000,
                    });
                    $('#modal-ubah').modal('hide');
                    location.reload(); // Refresh halaman untuk melihat perubahan
                },
                error: function(xhr) {
                    // Tampilkan pesan error jika diperlukan
                    console.log("error");
                }
            });
        });
    </script>
@endpush
