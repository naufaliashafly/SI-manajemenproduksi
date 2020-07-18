<div class="container">
    <?php if ($this->session->flashdata('status') == "berhasil") { ?>
        <div class="alert alert-success"><i class="fas fa-check"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
    <?php } ?>
    <?php if ($this->session->flashdata('status') == "hapus") { ?>
        <div class="alert alert-secondary"><i class="fas fa-trash-alt"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
    <?php } ?>
    <!-- Project Card Stok -->
    <div class="card shadow mb-4">
        <nav class="navbar navbar-light bg-light">
            <div class="col">
             <a class="navbar-brand">Stok-Edit Barang Huller</a>
         </div>
    </nav>
    <br>
    <div class="box">
        <div class="container">
            <table class="table-responsive table-bordered nowrap table-bordered table-sm table-hover" id="table" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Kode Barang</th>
                        <th class="text-center">Jenis Olahan</th>
                        <th class="text-center">Tanggal Huller</th>
                        <th class="text-center">Bobot Masuk</th>
                        <th class="text-center">Bobot Selesai</th>
                        <th class="text-center">Rendemen Huller</th>
                        <th class="text-center">Tindakan</th>
                        <th class="text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($stok as $t) { ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td><?php echo $t->kodebarang; ?></td>
                            <td><?php echo $t->jenisolahan; ?></td>
                            <td><?php echo $t->tanggalhuller; ?></td>
                            <td><?php echo $t->bobotmasukhull; ?></td>
                            <td><?php echo $t->bobothuller; ?></td>
                            <td><?php echo $t->rendemenhuller; ?> %</td>
                            <td class="text-center">
                                <div class="text-center inline">
                                    <a href="#" data-toggle="modal" data-target="#editbarang" onclick="edit(<?php echo $t->id_barangdatang; ?>)">
                                        <i class="fas fa-edit" style="color: #03ad30" title="edit"></i>
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="<?php echo site_url('inputhuller/hapus/'.$t->id_barangdatang)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
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

<!-- Modal Edit -->
<div class="modal fade" role="dialog" id="editbarang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Edit Barang Huller</h4>
                <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <?php echo form_open('inputhuller/update') ?>
                <div class="form-group">
                    <label class="control-label" for="kode">Kode Barang</label>
                    <input type="text" name="kodebarang" class="form-control" id="kode" readonly>
                </div>
                <div class="form-group">
                    <label class="control-label" for="tgl">Tanggal Huller</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="date" class="form-control" name="tanggalhuller" id="tgl" autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bobot">Bobot Masuk Huller</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" id="bobot1" name="bobotmasukhull">
                        </div>
                        <label>kg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bobot">Bobot Huller</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" id="bobot2" name="bobothuller">
                        </div>
                        <label>kg</label>
                    </div>
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
        url: "<?php echo site_url('inputhuller/edit_data'); ?>",
        type: "post",
        dataType: 'json',
        data: {id: idbarang},
        cache: false,
        success: function(result) {
            $('#id_barangdatang').val(result['id_barangdatang']);
            $('#kode').val(result['kodebarang']);
            $('#tgl').val(result['tanggalhuller']);
            $('#bobot1').val(result['bobotmasukhull']);
            $('#bobot2').val(result['bobothuller']);
        }
    });
}

</script>