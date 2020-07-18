<style>
    .font-weight-bold{
        border: none;
        font-size: 18px;
    }
</style>

<div class="container">
    <!-- Project Card Input Barang Masuk -->
    <?php if ($this->session->flashdata('status') == "gagalvar") { ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('message') ?></div>
    <?php } ?>
    <?php if ($this->session->flashdata('status') == "berhasilvar") { ?>
        <div class="alert alert-success"><i class="fas fa-check"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
    <?php } ?>
    <?php if ($this->session->flashdata('status') == "gagalblok") { ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('message') ?></div>
    <?php } ?>
    <?php if ($this->session->flashdata('status') == "berhasilblok") { ?>
        <div class="alert alert-success"><i class="fas fa-check"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
    <?php } ?>
    <?php if ($this->session->flashdata('status') == "berhasil") { ?>
        <div class="alert alert-success"><i class="fas fa-check"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
    <?php } ?>
    <?php if ($this->session->flashdata('status') == "hapus") { ?>
        <div class="alert alert-success"><i class="fas fa-trash-alt"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
    <?php } ?>

    <!-- Project Card Input Barang Masuk -->
    <div class="card shadow mb-4">
        <nav class="navbar navbar-light bg-light">
            <div class="col">
               <a class="navbar-brand">Input Barang Masuk</a>
           </div>
       </nav>
       <!-- Project Card Input Data -->
       <div class="card-body">
        <div class="container">
            <!-- Form -->
            <?= form_open('inputbarangmasuk/proses'); ?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Waktu Datang</label>
                <div class="form-row">
                    <div class="col">
                        <input type="date" class="form-control" name="tanggaldatang" id="tanggaldat" oninput="myFunction()">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Varietas</label>
                <div class="form-row">
                    <div class="col">
                        <select class="form-control select1" name="varietas" id="variet" onchange="myFunction()">
                            <option>---Varietas---</option>
                            <?php
                            foreach ($dd_varietas as $row) {
                                echo "<option value='" . $row->varietas . "'>" . $row->varietas . "</option>";
                            }?>
                        </select>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#tambahvarietas">
                        <i class="fas fa-plus" style="padding-top: 10px;"></i>
                    </a>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Blok/Mitra</label>
                <div class="form-row">
                    <div class="col">
                        <select class="form-control select2" name="blokmitra" id="blokmit" onchange="myFunction()">
                            <option>---Blok/Mitra---</option>
                            <?php
                            foreach ($dd_blokmitra as $row) {
                                echo "<option value='" . $row->blokmitra . "'>" . $row->blokmitra . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#tambahblokmitra">
                        <i class="fas fa-plus" style="padding-top: 10px;"></i>
                    </a>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Status Barang Datang</label>
                <div class="form-row">
                    <div class="col">
                        <select class="form-control select1" name="statusdatang" id="statusdatang" >
                            <option>---Status---</option>
                            <?php
                            foreach ($dd_statusdatang as $row) {
                                echo "<option value='" . $row->id_statusbarangdatang . "'>" . $row->statusbarangdatang . "</option>";
                            }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Bobot</label>
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="" id="bobotdat" name="bobotdatang" oninput="myFunction()">
                    </div>
                    <label for="exampleFormControlInput1">kg</label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Kadar Air</label>
                <input type="text" class="form-control" placeholder="" id="kadarairawal" name="kadarairawal">
            </div>
            <div class="form-group">
                <label class="control-label" for="tgl">Jenis Olahan</label>
                <div class="form-row">
                    <select class="form-control select2" name="jenisolahan">
                        <option>---Jenis Olahan---</option>
                        <?php
                        foreach ($dd_jenisolahan as $row) {
                            echo "<option value='" . $row->jenisolahan . "'>" . $row->jenisolahan . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Kode Barang</label>
                <p id="demo" class="font-weight-bold"></p>
                <script>
                    function myFunction() {
                        var variet = document.getElementById("variet").value;
                        var blokmit = document.getElementById("blokmit").value;
                        var bobotdat = document.getElementById("bobotdat").value;
                        var tanggaldat = document.getElementById("tanggaldat").value;
                        document.getElementById("demo").innerHTML = variet + blokmit + bobotdat + tanggaldat;
                    }
                </script>
            </div>
            <div class="checkbox py-3">
                <!-- Input by, valuenya diisi pake id_usernya dia -->
                <label> 
                    <input type="checkbox" name="id_user" value="<?= $user->id_user ?>" required="Isi sebagai penanggungjawab penginput data"> Data di input oleh <?= $user->nama ?>
                </label>
            </div>
            <div>
                <input type="hidden" name="status" class="form-control" value="di input" required readonly>
                <input type="hidden" name="proses" class="form-control" value="Jemur" required readonly>
                <button type="submit" name="simpan" class="btn btn-primary btn-md btn-block">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <!-- Akhir Input -->


    <!-- Modal Tambah Varietas -->
    <div class="modal fade" role="dialog" id="tambahvarietas">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Tambah Varietas</h4>
                    <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('inputbarangmasuk/tambah_var') ?>
                    <div class="form-group">
                        <label class="control-label" for="tambahvarietas">Nama Varietas</label>
                        <input type="text" name="tambahvarietas" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"></i> Simpan</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Tambah Blokmitra -->
    <div class="modal fade" role="dialog" id="tambahblokmitra">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Tambah Blok/Mitra</h4>
                    <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('inputbarangmasuk/tambah_blok') ?>
                    <div class="form-group">
                        <label class="control-label" for="tambahblokmitra">Nama Blok/Mitra</label>
                        <input type="text" name="tambahblokmitra" class="form-control" id="tambahblokmitra" required autofocus>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"> Simpan</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>  

