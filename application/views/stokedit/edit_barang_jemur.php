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
             <a class="navbar-brand">Stok-Edit Barang Jemur</a>
         </div>
    </nav>
    <br>
    <div class="box">
        <div class="container">
            <table class="table-responsive table-bordered nowrap table-sm table-hover" id="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Posisi Lantai Jemur</th>
                        <th class="text-center">Kode Barang</th>
                        <th class="text-center">Jenis Olahan</th>
                        <th class="text-center">Tanggal Jemur</th>
                        <th class="text-center">Tindakan</th>
                        <th class="text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($stok as $t) { ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td><?php echo $t->posisibarang; ?></td>
                            <td><?php echo $t->kodebarang; ?></td>
                            <td><?php echo $t->jenisolahan; ?></td>
                            <td><?php echo $t->tanggalmasukjemuran; ?></td>
                            <td class="text-center">
                                <div class="text-center inline">
                                    <a href="#" data-toggle="modal" data-target="#editbarang" onclick="edit(<?php echo $t->id_barangdatang; ?>)">
                                        <i class="fas fa-edit" style="color: #03ad30" title="edit"></i>
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="<?php echo site_url('inputlantaijemur/hapus/'.$t->id_barangdatang)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
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
                <h4>Edit Barang Lantai Jemur</h4>
                <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <?php echo form_open('inputlantaijemur/update') ?>
                <div class="form-group">
                    <label class="control-label" for="kode">Kode Barang</label>
                    <input type="text" name="kodebarang" class="form-control" id="kode" readonly>
                </div>
                <div class="form-group">
                    <label class="control-label" for="tgl">Tanggal Masuk Jemuran</label>
                    <input type="date" class="form-control" placeholder="" id="tgl" name="tanggalmasukjemuran">
                </div>
                <div class="form-group">
                    <label class="control-label" for="tgl">Jenis Olahan</label>
                    <div class="form-row">
                        <input type="text" class="form-control" id="jenis" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kadarairawal">Posisi lantai Jemur</label>
                    <div class="form-row">
                        <div class="col-4">
                            <input type="text" class="form-control" id="posisi" readonly>
                        </div>
                        <div class="col">
                            <select class="form-control select2" name="posisibarang">
                                <option>---Posisi Barang---</option>
                                <?php
                                foreach ($dd_posisibarang as $row) {
                                    echo "<option value='" . $row->id_posisibarang . "'>" . $row->posisibarang . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="checkbox py-3">
                    <!-- Input by, valuenya diisi pake id_usernya dia -->
                    <label> 
                        <input type="checkbox" name="id_user" value="<?= $user->id_user ?>" required=""> Data di edit oleh <?= $user->nama ?>
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
        url: "<?php echo site_url('inputlantaijemur/edit_data'); ?>",
        type: "post",
        dataType: 'json',
        data: {id: idbarang},
        cache: false,
        success: function(result) {
            $('#id_barangdatang').val(result['id_barangdatang']);
            $('#kode').val(result['kodebarang']);
            $('#jenis').val(result['jenisolahan']);
            $('#tgl').val(result['tanggalmasukjemuran']);
            $('#posisi').val(result['posisibarang']);
        }
    });
}
</script>