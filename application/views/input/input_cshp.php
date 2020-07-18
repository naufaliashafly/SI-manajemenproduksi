<body>
    <div class="container">
        <?php if ($this->session->flashdata('status') == "berhasil") { ?>
            <div class="alert alert-success"><i class="fas fa-check"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
        <?php } ?>
        <?php if ($this->session->flashdata('status') == "hapus") { ?>
            <div class="alert alert-success"><i class="fas fa-trash-alt"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
        <?php } ?>
        <!-- Project Card Input Huller -->
        <div class="card shadow mb-4">
            <nav class="navbar navbar-light bg-light">
                <div class="col">
                 <a class="navbar-brand">Input CS+HP</a>
                </div>
            </nav>
            <!-- Project Card Input Data -->
            <div class="card-body">
                <div class="container">
                <!-- Form -->
                <?= form_open('inputcshp/proses'); ?>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tanggal CS+HP</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="date" class="form-control" name="tanggalcshp" id="tanggalcshp" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Varietas</label>
                    <div class="form-row">
                        <div class="col">
                            <select class="form-control select1" name="varietas" id="varietas" required="">
                                <option >---Varietas---</option>
                                <?php
                                foreach ($dd_varietas as $row) {
                                    echo "<option value='" . $row->varietas . "'>" . $row->varietas . "</option>";
                                }?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">Kode Barang:</label><br>
                        <?php foreach ($dd_kodebarang as $row) { ?>
                            <input type="checkbox" name="kodebarang[]" class="flat-red" value="<?php echo $row->id_barangdatang ?>"> <b> [<?php echo $row->jenisolahan ?> : <?php echo $row->bobot ?> kg] </b> <?php echo $row->kodebarang ?> <br>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Bobot Masuk CS+HP:</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="bobotmasuk" id="bobotmasuk" required>
                        </div>
                        <label for="exampleFormControlInput1">kg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Bobot selesai CS+HP</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="bobotcshp" id="bobotcshp" required>
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
                    <input type="hidden" name="proses" class="form-control" value="CS+HP" required readonly>
                    <button type="submit" class="btn btn-primary btn-md btn-block">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    
    $(document).ready(function(){
        $('.kodebarang').selectpicker();
                //AJAX REQUEST TO GET SELECTED PRODUCT
                $.ajax({
                    url: "<?php echo site_url('inputcshp/ambil_kodebarang');?>",
                    method: "POST",
                    data :{package_id:package_id},
                    cache:false,
                    success : function(data){
                        var item=data;
                        var val1=item.replace("[","");
                        var val2=val1.replace("]","");
                        var values=val2;
                        $.each(values.split(","), function(i,e){
                            $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                            $(".strings").selectpicker('refresh');

                        });
                    }
                    
                });
                return false;
            });
        </script>


