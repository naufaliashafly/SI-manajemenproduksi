<body>
<div class="container">
    <?php if ($this->session->flashdata('status') == "berhasil") { ?>
        <div class="alert alert-success"><i class="fas fa-check"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
    <?php } ?>
    <?php if ($this->session->flashdata('status') == "hapus") { ?>
        <div class="alert alert-secondary"><i class="fas fa-trash-alt"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
    <?php } ?>
    <!-- Project Card Stok Barang Ready -->
    <div class="card shadow mb-4">
        <nav class="navbar navbar-light bg-light">
            <div class="col">
                <a class="navbar-brand">Stok-Edit Barang Ready</a>
            </div>
        </nav>
        <br>
        <div class="box">
            <div class="container">
                <table class="table table-bordered table-sm table-hover" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Varietas</th>
                            <th class="text-center">Jenis Olahan</th>
                            <th class="text-center">Bobot</th>
                            <th class="text-center">Tindakan</th>
                            <th class="text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($edit as $t) { ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td class="text-center">
                                    <div class="text-center inline">
                                        <?php echo form_open('inputready/sold') ?>
                                        <input type="hidden" name="barangdatang" value="<?php echo $t->id_barangdatang; ?>">
                                        <input type="hidden" name="sold" value="2"> 
                                        <button type="submit" class="btn btn-sm btn-outline-danger">      
                                            Terjual
                                        </button>
                                        <?php echo form_close() ?>
                                    </div>
                                </td>
                                <td><?php echo $t->varietas ?></td>
                                <td><?php echo $t->jenisolahan ?></td>
                                <td><?php echo $t->bobot ?></td>
                                <td class="text-center">
                                    <div class="text-center inline">
                                        <a href="#" data-toggle="modal" data-target="#editbarang" onclick="edit(<?php echo $t->id_barangdatang; ?>)">
                                            <i class="fas fa-edit" style="color: #03ad30" title="edit"></i>
                                        </a>
                                        &nbsp;
                                        &nbsp;
                                        <a href="<?php echo site_url('inputready/hapus/'.$t->id_barangdatang)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                                            <i class="fas fa-trash-alt" title="hapus" style="color: #ff6b6b"></i>
                                        </a>
                                    </div>
                                </td>
                                <td><?php echo $t->status; ?> - <?php echo $t->nama; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" role="dialog" id="editbarang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Edit Barang Ready</h4>
                <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <?php echo form_open('inputready/update') ?>
                <div class="form-group">
                    <label class="control-label" for="kode">Kode Barang</label>
                    <input type="text" name="kodebarang" class="form-control" id="kode" readonly>
                </div>
                <div class="form-group">
                    <label for="bobot">Bobot</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" id="bobotg" name="bobot">
                        </div>
                        <label>kg</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="statusready" value="1" hidden>
                </div>
                <div class="checkbox py-3">
                    <!-- Input by, valuenya diisi pake id_usernya dia -->
                    <label> 
                        <input type="checkbox" name="id_user" value="<?= $user->id_user ?>" required="Isi sebagai penanggungjawab penginput data"> Data di edit oleh <?= $user->nama ?>
                    </label>
                </div>
                <div class="form-group">
                    <label class="control-label" for="id_barangdatang"></label>
                    <input type="hidden" name="id_barangdatang" class="form-control" id="id_barangdatang" required readonly>
                    <input type="hidden" name="status" class="form-control" value="di edit" required readonly>
                    <button type="submit" class="btn btn-success"></i> Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>



<!-- Plugin JS DataTables -->
<script src="<?= base_url('assets/'); ?>vendor/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$('#table').DataTable( {
    dom: 'lBfrtip'
} );
//Edit Barang
function edit(idbarang) {
    $.ajax({
        url: "<?php echo site_url('inputready/edit_data'); ?>",
        type: "post",
        dataType: 'json',
        data: {id: idbarang},
        cache: false,
        success: function(result) {
            $('#id_barangdatang').val(result['id_barangdatang']);
            $('#kode').val(result['kodebarang']);
            $('#bobotg').val(result['bobot']);
        }
    });
}


//Edit Barang
function sold(idbarang) {
    $.ajax({
        url: "<?php echo site_url('inputready/sold'); ?>",
        type: "post",
        dataType: 'json',
        data: {id: idbarang}
    });
}

</script>