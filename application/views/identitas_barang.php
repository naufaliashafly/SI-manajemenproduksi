<body>
    <div class="container">
        <!-- Project Card Input Barang Masuk -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="form-row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-primary">Input Identitas Barang</h6>
                    </div>
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <div class="nav-item">
                        <div>
                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">NAMA PETUGAS - JABATAN</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Form -->
                <Form method="post" action="<?= base_url('identitasbarang/index') ?>">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Varietas</label>
                        <input type="text" class="form-control" id="varietas" name="varietas" oninput="myFunction()">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Blok/Mitra</label>
                        <input type="text" class="form-control" id="blokmitra" name="blokmitra" oninput="myFunction()">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>