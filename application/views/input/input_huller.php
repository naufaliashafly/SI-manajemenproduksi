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
                   <a class="navbar-brand">Input Huller</a>
               </div>
            </nav>
            <!-- Project Card Input Data -->
            <div class="card-body">
                <div class="container">
                    <?= form_open('inputhuller/proses'); ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Huller</label>
                        <div class="form-row">
                            <div class="col">
                                <input type="date" class="form-control" name="tanggalhuller" id="tanggalhuller">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kode Barang</label>
                        <select class="form-control select2" onchange="change(this.value)" name="kodebarang" id="kodebarang">
                            <option value="0">---Kode Barang---</option>
                            <?php foreach ($dd_kodebarang as $row) { ?>
                                echo <option value= <?php echo $row->id_barangdatang ?> > <?php echo $row->kodebarang ?></option>;
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Bobot Kering</label>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="bobotkering" id="bk" readonly>
                            </div>
                            <label for="exampleFormControlInput1">kg</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Bobot Masuk Huller</label>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="bobotmasuk" id="bobotmasuk">
                            </div>
                            <label for="exampleFormControlInput1">kg</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Bobot Selesai Huller</label>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="bobothuller" id="bobothuller">
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
                        <input type="hidden" name="proses" class="form-control" value="Huller" required readonly>
                        <button type="submit" class="btn btn-primary btn-md btn-block">Simpan</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>




<script type="text/javascript">

function change(idk) {
    $.ajax({
        url: "<?php echo site_url('inputhuller/get_kering'); ?>",
        type: "post",
        dataType: 'json',
        data: {id: idk},
        cache: false,
        success: function(result) {
            $('#bk').val(result['bobotkering']);
        }
    });
}



$(document).ready(function(){
 
            $('#category').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('inputhuller/get_kering');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(result){   
                        $('#bk').val(result['tanggalmasukjemuran']);
 
                    }
                });
                return false;
            }); 
             
        });

</script>

