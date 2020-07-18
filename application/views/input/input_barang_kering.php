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
                   <a class="navbar-brand">Input Barang Kering</a>
               </div>
            </nav>
            <!-- Project Card Input Data -->
            <div class="card-body">
                <div class="container">
                    <form method="post" action="<?= base_url('inputbarangkering/proses1') ?>">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tanggal Kering</label>
                            <div class="form-row">
                                <div class="col">
                                    <input type="date" class="form-control" name="tanggalkering" id="tanggalkering">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kode Barang</label>
                            <select class="form-control select2" name="id_barangjemur" id="kodebarang">
                                <option>---Kode Barang---</option>
                                <?php
                                foreach ($tampil as $row) { ?>
                                    <option value="<?php echo $row->id_barangjemur ?>"> <?php echo $row->kodebarang ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Bobot Kering</label>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="" id="bobotkering" name="bobotkering">
                                </div>
                                <label for="exampleFormControlInput1">kg</label>
                            </div>
                        </div>
                        <div class="checkbox py-3">
                            <!-- Input by, valuenya diisi pake id_usernya dia -->
                            <label> 
                                <input type="checkbox" name="id_user" value="<?= $user->id_user ?>" required="Isi sebagai penanggungjawab penginput data"> Data di input oleh <?= $user->nama ?>
                            </label>
                        </div>
                        <div>
                            <input type="hidden" name="status" class="form-control" value="di input" required readonly>
                            <button type="submit" class="btn btn-primary btn-md btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


