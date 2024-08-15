@extends('admin.layout')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Master Data - Guru</h1>
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
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah-data">
            <i class="fas fa-plus"></i> <span>Tambah Data</span>
        </button>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Guru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Email</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $teacher->nip }}</td>
                                <td>{{ $teacher->nama_guru }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td class="d-lg-flex gap-2 ">

                                    <button type="button" class="btn btn-sm btn-warning btn-edit"
                                        data-id="{{ $teacher->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button data-id="{{ $teacher->id }}" type="button" data-toggle="modal"
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
    <div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('teacher.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" class="form-control" placeholder="NIP">
                        </div>
                        <div class="mb-3">
                            <label for="nama_guru">Nama Guru</label>
                            <input type="text" name="nama_guru" class="form-control" placeholder="Nama Guru">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
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

    <!-- Modal ubah data -->
    <div class="modal fade" id="modal-ubah" tabindex="-1" aria-labelledby="modal-ubah" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Ubah Data Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="update">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP">
                        </div>
                        <div class="mb-3">
                            <label for="nama_guru">Nama Guru</label>
                            <input type="text" name="nama_guru" class="form-control" id="nama_guru"
                                placeholder="Nama Guru">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Email">
                        </div>
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
            var url = "{{ route('teacher.destroy', ':id') }}".replace(':id', id);
            $('#form-delete').attr('action', url);
        });
    </script>
    <script>
        $('.btn-edit').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ route('teacher.edit', ':id') }}".replace(':id', id);
            // window.location.href = url;
            $('#modal-ubah').attr('action', url);
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('#modal-ubah').modal('show');
                    $('#modal-ubah').find('#id').val(data.id);
                    $('#modal-ubah').find('#nip').val(data.nip);
                    $('#modal-ubah').find('#nama_guru').val(data.nama_guru);
                    $('#modal-ubah').find('#email').val(data.email);
                }

            });

        });
    </script>
    <script>
        $('.btn-update').click(function(e) {
            e.preventDefault();

            let id = $('#id').val();
            let nip = $('#nip').val();
            let nama_guru = $('#nama_guru').val();
            let email = $('#email').val();
            let token = $("meta[name='csrf-token']").attr("content");

            var url = "{{ route('teacher.update', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'PUT',
                data: {
                    "id": id,
                    "nip": nip,
                    "nama_guru": nama_guru,
                    "email": email,
                    "_token": token
                },
                success: function(response) {
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
