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
             <a class="navbar-brand">Stok-Edit Barang Suton & Grading</a>
         </div>
    </nav>
    <br>
    <div class="box">
        <div class="container pb-3">
            <div class="table-responsive">
            <table class="table-responsive table-bordered nowrap table-bordered table-sm table-hover" id="table" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center" rowspan="2">#</th>
                        <!-- <th class="text-center" rowspan="2">Kode Barang</th> -->
                        <th class="text-center" rowspan="2">Kode Suton+Grading</th>
                        <th class="text-center" rowspan="2">Tanggal Suton-Grading</th>
                        <th class="text-center" rowspan="2">Bobot Masuk</th>
                        <th class="text-center" colspan="8">Bobot Selesai</th>
                        <th class="text-center" rowspan="2">Rendemen</th>
                        <th class="text-center" rowspan="2">Tindakan</th>
                        <th class="text-center" rowspan="2">Keterangan</th>
                    </tr>
                    <tr>
                        <th>MB</th>
                        <th>BB</th>
                        <th>PB</th>
                        <th>L2</th>
                        <th>L3</th>
                        <th>PBK</th>
                        <th>ELV</th>
                        <th>Total</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($stok as $t) { ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <!-- <td><?php echo $t->kodebarang; ?></td> -->
                            <td><?php echo $t->kodesutongrading; ?></td>
                            <td><?php echo $t->tanggalsutongrading; ?></td>
                            <td><?php echo $t->bobotmasuksut; ?></td>
                            <td><?php echo $t->MB; ?></td>
                            <td><?php echo $t->BB; ?></td>
                            <td><?php echo $t->PB; ?></td>
                            <td><?php echo $t->L2; ?></td>
                            <td><?php echo $t->L3; ?></td>
                            <td><?php echo $t->PBK; ?></td>
                            <td><?php echo $t->ELV; ?></td>
                            <td><?php echo $t->bobotsutongrading; ?></td>
                            <td><?php echo $t->rendemensutongrading; ?> %</td>
                            <td class="text-center">
                                <div class="text-center inline">
                                    <a href="#" data-toggle="modal" data-target="#editbarang" onclick="edit(<?php echo $t->id_barangdatang; ?>)">
                                        <i class="fas fa-edit" style="color: #03ad30" title="edit"></i>
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="<?php echo site_url('inputsutongrading/hapus/'.$t->id_barangdatang)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
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
                <h4>Edit Barang Suton+Grading</h4>
                <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <?php echo form_open('inputsutongrading/update') ?>
                <div class="form-group">
                    <label class="control-label" for="kode">Kode Barang</label>
                    <input type="text" name="kodebarang" class="form-control" id="kode" readonly>
                </div>
                <div class="form-group">
                    <input type="text" name="varietas" class="form-control" id="var" hidden>
                </div>
                <div class="form-group">
                    <label>Tanggal Suton-Grading</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="date" class="form-control" name="tanggalsutongrading" id="tgl">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Bobot Masuk Suton+Grading:</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="bobotmasuk" id="bobot">
                        </div>
                        <label>kg</label>
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
                                        <input type="text" class="form-control" name="MB" id="M">
                                    </div>
                                    <label for="exampleFormControlInput1">kg</label>
                                </div>
                                <div class="form-row pt-2">
                                    <label for="exampleFormControlInput1">PB</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="PB" id="P">
                                    </div>
                                    <label for="exampleFormControlInput1">kg</label>
                                </div>
                                <div class="form-row pt-2">
                                    <label for="exampleFormControlInput1">L3</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="L3" id="LL">
                                    </div>
                                    <label for="exampleFormControlInput1">kg</label>
                                </div>
                                <div class="form-row pt-2">
                                    <label for="exampleFormControlInput1">ELV</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="ELV" id="EL">
                                    </div>
                                    <label for="exampleFormControlInput1">kg</label>
                                </div>
                            </div>
                            <!--container kanan -->
                            <div class="col container-sm pl-2 pt-3">
                                <div class="form-row">
                                    <label for="exampleFormControlInput1">BB</label>
                                    <div class="col-9 pl-">
                                        <input type="text" class="form-control" name="BB" id="B">
                                    </div>
                                    <label for="exampleFormControlInput1">kg</label>
                                </div>
                                <div class="form-row pt-2">
                                    <label for="exampleFormControlInput1">L2</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="L2" id="L">
                                    </div>
                                    <label for="exampleFormControlInput1">kg</label>
                                </div>
                                <div class="form-row pt-2">
                                    <label for="exampleFormControlInput1">PBK</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="PBK" id="PB">
                                    </div>
                                    <label for="exampleFormControlInput1">kg</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
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
        url: "<?php echo site_url('inputsutongrading/edit_data'); ?>",
        type: "post",
        dataType: 'json',
        data: {id: idbarang},
        cache: false,
        success: function(result) {
            $('#id_barangdatang').val(result['id_barangdatang']);
            $('#kode').val(result['kodesutongrading']);
            $('#var').val(result['varietas']);
            $('#bobot').val(result['bobotmasuksut']);
            $('#tgl').val(result['tanggalsutongrading']);
            $('#M').val(result['MB']);
            $('#B').val(result['BB']);
            $('#P').val(result['PB']);
            $('#L').val(result['L2']);
            $('#LL').val(result['L3']);
            $('#PB').val(result['PBK']);
            $('#EL').val(result['ELV']);
        }
    });
}

</script>