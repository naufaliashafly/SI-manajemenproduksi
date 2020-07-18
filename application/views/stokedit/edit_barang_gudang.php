<body>
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
               <a class="navbar-brand">Stok-Edit Barang Gudang</a>
            </div>
        </nav>
        <br>
        <div class="container pb-3">
            <button class="btn btn-success" type="button" href="#" data-toggle="modal" data-target=".bd-example-modal-xl">
                Layout gudang
            </button>
        </div>
        <div class="box">
            <div class="container">
                <table class="table table-bordered table-sm table-hover" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Letak Gudang</th>
                            <th class="text-center">Kode Barang</th>
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
                                <td><?php echo $t->letakgudang ?></td>
                                <td><?php echo $t->kodebarang ?></td>
                                <td><?php echo $t->jenisolahan ?></td>
                                <td><?php echo $t->bobot ?></td>
                                <td class="text-center">
                                    <div class="text-center inline">
                                        <a href="#" data-toggle="modal" data-target="#editbarang" onclick="edit(<?php echo $t->id_barangdatang; ?>)">
                                            <i class="fas fa-edit" style="color: #03ad30" title="edit"></i>
                                        </a>
                                        &nbsp;
                                        &nbsp;
                                        <a href="<?php echo site_url('inputgudang/hapus/'.$t->id_barangdatang)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
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
<!-- Modal layout -->
<div class="modal fade bd-example-modal-xl" role="dialog" id="layout">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Layout Gudang</h4>
                <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="../assets/img/layout_gudang.png">
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
                <h4>Edit Barang Gudang</h4>
                <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <?php echo form_open('inputgudang/update') ?>
                <div class="form-group">
                    <label class="control-label" for="kode">Kode Barang</label>
                    <input type="text" name="kodebarang" class="form-control" id="kode" readonly>
                </div>
                <div class="form-group">
                    <label class="control-label" for="tgl">Letak Gudang</label>
                    <div class="form-row">
                        <div class="col-3">
                            <input type="text" class="form-control" id="letak" readonly>
                        </div>
                        <div class="col">
                            <select class="form-control select2" name="letakgudang">
                                <option>---Letak Gudang---</option>
                                <?php foreach ($dd_letakgudang as $row) {
                                    echo "<option value='" . $row->id_letakgudang . "'>" . $row->letakgudang . "</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
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


<!-- Modal Edit -->
<div class="modal fade" role="dialog" id="editbarang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Edit Barang Masuk</h4>
                <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <?php echo form_open('inputbarangmasuk/update') ?>
                <div class="form-group">
                    <label class="control-label" for="kode">Kode Barang</label>
                    <input type="text" name="kodebarang" class="form-control" id="kode" readonly>
                </div>
                <div class="form-group">
                    <label class="control-label" for="tgl">Jenis Olahan</label>
                    <div class="form-row">
                        <div class="col-3">
                            <input type="text" class="form-control" id="jenis" readonly>
                        </div>
                        <div class="col">
                            <select class="form-control select2" name="jenisolahan">
                                <option>---Jenis Olahan---</option>
                                <?php foreach ($dd_jenisolahan as $row) {
                                    echo "<option value='" . $row->jenisolahan . "'>" . $row->jenisolahan . "</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="varietas" class="form-control" id="var" hidden>
                </div>
                <div class="form-group">
                    <input type="text" name="blokmitra" class="form-control" id="blok" hidden>
                </div>
                <div class="form-group">
                    <label class="control-label" for="tgl">Waktu Datang</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="date" class="form-control" name="tanggaldatang" id="tgl" autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bobot">Bobot</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" id="bobot" name="bobotdatang">
                        </div>
                        <label>kg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kadarairawal">Kadar Air</label>
                    <input type="text" class="form-control" placeholder="" id="ka" name="kadarairawal">
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
        url: "<?php echo site_url('inputgudang/edit_data'); ?>",
        type: "post",
        dataType: 'json',
        data: {id: idbarang},
        cache: false,
        success: function(result) {
            $('#id_barangdatang').val(result['id_barangdatang']);
            $('#kode').val(result['kodebarang']);
            $('#letak').val(result['letakgudang']);
            $('#bobotg').val(result['bobot']);
        }
    });
}

</script>