    <!-- Modal ubah data -->
    <div class="modal fade" id="modal-ubah" tabindex="-1" aria-labelledby="modal-ubah" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP"
                                value="{{ $teacher->nip }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama_guru">Nama Guru</label>
                            <input type="text" name="nama_guru" class="form-control" id="nama_guru"
                                placeholder="Nama Guru" value="{{ $teacher->nama_guru }}">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                value="{{ $teacher->email }}">
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
