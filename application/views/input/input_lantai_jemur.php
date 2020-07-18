<body>
    <div class="container">
        <?php if ($this->session->flashdata('status') == "berhasil") { ?>
            <div class="alert alert-success"><i class="fas fa-check"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
        <?php } ?>
        <?php if ($this->session->flashdata('status') == "hapus") { ?>
            <div class="alert alert-success"><i class="fas fa-trash-alt"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
        <?php } ?>
        <!-- Project Card Input Jemur -->
        <div class="card shadow mb-4">
            <nav class="navbar navbar-light bg-light">
                <div class="col">
                    <a class="navbar-brand">Input Barang jemur</a>
             </div>
         </nav>
         <div class="card-body">
            <!-- Form -->
            <div >
                <!-- <p>
                    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#jemurkedua" aria-expanded="false" aria-controls="collapseExample">
                        Penjemuran ke-2
                    </button>
                    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#jemur" aria-expanded="false" aria-controls="collapseExample" hidden>
                    </button>
                </p> -->
                <!-- Toggle Jemur -->
                <div class="collapse show" id="jemur">
                    <div class="card-body">
                        <form method="post" action="<?= base_url('inputlantaijemur/proses') ?>">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tanggal Masuk Jemuran</label>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="date" class="form-control" name="tanggalmasukjemur" id="tanggalmasukjemur">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kode Barang</label>
                                <select class="form-control select2" name="kodebarang" id="kodebarang">
                                    <option>---Kode Barang---</option>
                                    <?php
                                    foreach ($dd_kodebarang as $row) {
                                        echo "<option value='" . $row->id_barangdatang . "'>" . $row->kodebarang . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Posisi Barang</label>
                                <select class="form-control select2" name="posisibarang" id="posisibarang">
                                    <option>---Posisi Barang---</option>
                                    <?php foreach ($dd_posisibarang as $row) {
                                        echo "<option value='" . $row->id_posisibarang . "'>" . $row->posisibarang . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <input type="checkbox" name="id_user" value="<?= $user->id_user ?>" required="Isi sebagai penanggungjawab penginput data"> Data di input oleh <?= $user->nama ?>
                            </div>
                            <br>
                            <div>
                                <input type="hidden" name="status" class="form-control" value="di input" required readonly>
                                <button type="submit" class="btn btn-primary btn-md btn-block">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <br>
                </div>



                
                <!-- Toggle jemur ke-2 -->
                <div class="collapse" id="jemurkedua">
                    <div class="card card-body">
                        <form method="post" action="<?= base_url('inputlantaijemur/proses') ?>">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kode Barang</label>
                                <select class="form-control select2" name="kodebarang" id="kodebarang">
                                    <option>---Kode Barang---</option>
                                    <?php
                                    foreach ($dd_kodebarang as $row) {
                                        echo "<option value='" . $row->id_barangdatang . "'>" . $row->kodebarang . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Posisi Barang</label>
                                <select class="form-control select2" name="posisibarang" id="posisibarang">
                                    <option>---Posisi Barang---</option>
                                    <?php foreach ($dd_posisibarang as $row) {
                                        echo "<option value='" . $row->id_posisibarang . "'>" . $row->posisibarang . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tanggal Masuk Jemuran</label>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="date" class="form-control" name="tanggalmasukjemur" id="tanggalmasukjemur">
                                    </div>
                                </div>
                            </div>
                            <br>
                            
                            <div>
                                
                                <button type="submit" class="btn btn-primary btn-md btn-block">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>



