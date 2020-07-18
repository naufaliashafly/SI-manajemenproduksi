<body>
    <div class="container">
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
                 <a class="navbar-brand">Input Suton Grading</a>
             </div>
            </nav>
            <!-- Project Card Input Data -->
            <div class="card-body">
                <div class="container">
                    <?= form_open('inputsutongrading/proses'); ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Suton-Grading</label>
                        <div class="form-row">
                            <div class="col">
                                <input type="date" class="form-control" name="tanggalsutongrading" id="tanggalsutongrading">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Varietas</label>
                        <div class="form-row">
                            <div class="col">
                                <select class="form-control select1" name="varietas" id="varietas" >
                                    <option>---Varietas---</option>
                                    <?php
                                    foreach ($dd_varietas as $row) {
                                        echo "<option value='" . $row->varietas . "'>" . $row->varietas . "</option>";
                                    }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Kode Barang:</label><br>
                        <?php foreach ($dd_kodebarang as $row) { ?>
                            <input type="checkbox" name="kodebarang[]" class="flat-red" value="<?php echo $row->id_barangdatang ?>"> <b>[<?php echo $row->jenisolahan ?>: <?php echo $row->bobot ?> kg]</b> <?php echo $row->kodebarang ?> <br>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Bobot Masuk Suton+Grading:</label>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="bobotmasuk" id="bobotmasuk">
                            </div>
                            <label for="exampleFormControlInput1">kg</label>
                        </div>
                    </div>
                    <div class="form-group">  
                        <label for="exampleFormControlInput1">Bobot</label>
                        <div class="container border border-light">
                            <div class="form-row ">
                                <!--container kiri -->
                                <div class="col container-sm pl-2 pt-3">
                                    <div class="form-row">
                                        <label for="exampleFormControlInput1">MB</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="MB" placeholder="">
                                        </div>
                                        <label for="exampleFormControlInput1">kg</label>
                                    </div>
                                    <div class="form-row pt-2">
                                        <label for="exampleFormControlInput1">PB</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="PB" placeholder="">
                                        </div>
                                        <label for="exampleFormControlInput1">kg</label>
                                    </div>
                                    <div class="form-row pt-2">
                                        <label for="exampleFormControlInput1">L3</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="L3" placeholder="">
                                        </div>
                                        <label for="exampleFormControlInput1">kg</label>
                                    </div>
                                    <div class="form-row pt-2">
                                        <label for="exampleFormControlInput1">ELV</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="ELV" placeholder="">
                                        </div>
                                        <label for="exampleFormControlInput1">kg</label>
                                    </div>
                                </div>
                                <!--container kanan -->
                                <div class="col container-sm pl-2 pt-3">
                                    <div class="form-row">
                                        <label for="exampleFormControlInput1">BB</label>
                                        <div class="col-9 pl-">
                                            <input type="text" class="form-control" name="BB" placeholder="">
                                        </div>
                                        <label for="exampleFormControlInput1">kg</label>
                                    </div>
                                    <div class="form-row pt-2">
                                        <label for="exampleFormControlInput1">L2</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="L2" placeholder="">
                                        </div>
                                        <label for="exampleFormControlInput1">kg</label>
                                    </div>
                                    <div class="form-row pt-2">
                                        <label for="exampleFormControlInput1">PBK</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="PBK" placeholder="">
                                        </div>
                                        <label for="exampleFormControlInput1">kg</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="checkbox py-3">
                                <!-- Input by, valuenya diisi pake id_usernya dia -->
                                <label> 
                                    <input type="checkbox" name="id_user" value="<?= $user->id_user ?>" required="Isi sebagai penanggungjawab penginput data"> Data di input oleh <?= $user->nama ?>
                                </label>
                            </div>
                            <div>
                                <input type="hidden" name="status" class="form-control" value="di input" required readonly>
                                <input type="hidden" name="proses" class="form-control" value="Suton+Grading" required readonly>
                                <button type="submit" name="input" class="btn btn-primary btn-md btn-block mt-3">Simpan</button>
                            </div>
                            <br>
                        </div>
                    </div> 
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>

        