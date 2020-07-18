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
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Input Blending</h6>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="input-tab" data-toggle="tab" href="#input" role="tab" aria-controls="input" aria-selected="true">Input Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Edit Data</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- Project Card Input Data -->
                <div class="tab-pane fade show active" id="input" role="tabpanel" aria-labelledby="input-tab">
                    <div class="card-body">
                        <!-- Form -->
                        <?= form_open('inputblending/proses'); ?>
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
                                <input type="checkbox" name="id_barangdatang" class="flat-red" value="<?php echo $row->id_barangdatang ?>"> <b> [ <?php echo $row->kodecshp ?> ] </b> <?php echo $row->kodebarang ?>  // <?php echo $row->id_barangdatang ?>  // <?php echo $row->id_barangcshp ?><br>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tanggal Blending</label>
                            <div class="form-row">
                                <div class="col">
                                    <input type="date" class="form-control" name="tanggalblending" id="tanggalblending">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot Blending</label>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" id="bobot" name="bobotblending">
                                </div>
                                <label>kg</label>
                            </div>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <!-- Project Card Edit Data -->
                <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                    <br>
                    <div class="container">
                        <div class="box">
                            <div class="box-body">
                                <table class="table table-bordered table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Kode Barang</th>
                                            <th class="text-center">Kode Blending</th>
                                            <th class="text-center">Tanggal Blending</th>
                                            <th class="text-center">Bobot Masuk</th>
                                            <th class="text-center">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($tampil as $t) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $no++ ?></td>
                                                <td><?php echo $t->kodebarang ?></td>
                                                <td><?php echo $t->kodeblending ?></td>
                                                <td><?php echo $t->tanggalblending ?></td>
                                                <td><?php echo $t->bobotblending ?></td>
                                                <td class="text-center">
                                                    <div class="text-center inline">
                                                        <a href="#" data-toggle="modal" data-target="#editbarang" onclick="edit(<?php echo $t->id_barangdatang; ?>)">
                                                            <i class="fas fa-edit" style="color: #03ad30" title="edit"></i>
                                                        </a>
                                                        &nbsp;
                                                        &nbsp;
                                                        <a href="<?php echo site_url('inputblending/hapus/'.$t->id_barangdatang)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                                                            <i class="fas fa-trash-alt" title="hapus" style="color: #ff6b6b"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Modal Edit -->
                <div class="modal fade" role="dialog" id="editbarang">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Edit Barang Blending</h4>
                                <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open('inputblending/update') ?>
                                <div class="form-group">
                                    <label class="control-label" for="kode">Kode Barang</label>
                                    <input type="text" name="kodebarang" class="form-control" id="kode" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="tgl">Tanggal Blending</label>
                                    <input type="date" class="form-control" placeholder="" id="tgl" name="tanggalblending">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Bobot Masuk</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" class="form-control" name="bobotmasukblend" id="bobot1">
                                        </div>
                                        <label for="exampleFormControlInput1">kg</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Bobot Blending</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" class="form-control" name="bobotblending" id="bobot2">
                                        </div>
                                        <label for="exampleFormControlInput1">kg</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="id_barangdatang"></label>
                                    <input type="hidden" name="id_barangdatang" class="form-control" id="id_barangdatang" required readonly>
                                    <button type="submit" class="btn btn-success"></i> Simpan</button>
                                </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript">
        //Edit Barang
function edit(idbarang) {
    $.ajax({
        url: "<?php echo site_url('inputblending/edit_data'); ?>",
        type: "post",
        dataType: 'json',
        data: {id: idbarang},
        cache: false,
        success: function(result) {
            $('#id_barangdatang').val(result['id_barangdatang']);
            $('#kode').val(result['kodebarang']);
            $('#tgl').val(result['tanggalblending']);
            $('#bobot1').val(result['bobotmasukblend']);
            $('#bobot2').val(result['bobotblending']);
        }
    });
}
</script>


