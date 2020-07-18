<div class="row mx-1">
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="form-row">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Varietas</h6>
                    <div class="topbar-divider d-none d-sm-block"></div>
                </div>
            </div>
            <div class="px-2 py-2">
                <?php if ($this->session->flashdata('status') == "gagalvar") { ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('message') ?></div>
                <?php } ?>
                <?php if ($this->session->flashdata('status') == "berhasilvar") { ?>
                    <div class="alert alert-success"><i class="fas fa-check"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
                <?php } ?>
                <?php if ($this->session->flashdata('status') == "hapusvar") { ?>
                    <div class="alert alert-success"><i class="fas fa-trash-alt"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
                <?php } ?>
            </div>
            <div class="pt-0 pl-2">
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#tambahvarietas"  style="font-size:14px" title="tambah varietas">
                    Tambah Varietas
                </a>
            </div>
            <div class="table-responsive px-2 py-2">
                <table id="example" class="table-sm table-bordered nowrap" width="100%" cellspacing="0">
                    <thead>
                        <tr class='text-center'>
                            <th>No</th>
                            <th>Nama Varietas</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <?php $no = 1; foreach ($varietas as $row) {?> 
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?php echo $row->varietas; ?></td>
                                <td>
                                    <div class="text-center inline">
                                        <a href="#" data-toggle="modal" data-target="#editvarietas" onclick="editvar(<?php echo $row->id_varietas; ?>)">
                                            <i class="fas fa-edit" style="color: #03ad30" title="edit"></i>
                                        </a>
                                        &nbsp;
                                        &nbsp;
                                        <a href="<?php echo site_url('tabelvarblok/hapus_var/'.$row->varietas)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                                            <i class="fas fa-trash-alt" title="hapus" style="color: #ff6b6b"></i>
                                        </a>
                                    </div>
                                </td> 
                            </tr>
                        <?php  } ?>   
                    </tbody>
                </table>
            </div>
        <!-- Modal Tambah Varietas -->
            <div class="modal fade" role="dialog" id="tambahvarietas">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Tambah Varietas</h4>
                            <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('tabelvarblok/tambah_var') ?>
                            <div class="form-group">
                                <label class="control-label" for="tambahvarietas">Nama Varietas</label>
                                <input type="text" name="tambahvarietas" class="form-control" autofocus>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"></i> Simpan</button>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal Edit Varietas -->
            <div class="modal fade" role="dialog" id="editvarietas">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Edit Varietas</h4>
                            <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('tabelvarblok/update_var') ?>
                            <div class="form-group">
                                <label class="control-label" for="var">Nama Varietas</label>
                                <input type="text" name="varietas" class="form-control" id="var" autofocus>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="idv"></label>
                                <input type="hidden" name="idv" class="form-control" id="idv" required readonly>
                                <button type="submit"class="btn btn-success"></i> Simpan</button>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>         
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="form-row">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Blok/Mitra</h6>
                    <div class="topbar-divider d-none d-sm-block"></div>
                </div>
            </div>
            <div class="px-2 py-2">
                <?php if ($this->session->flashdata('status') == "gagalblok") { ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('message') ?></div>
                <?php } ?>
                <?php if ($this->session->flashdata('status') == "berhasilblok") { ?>
                    <div class="alert alert-success"><i class="fas fa-check"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
                <?php } ?>
                <?php if ($this->session->flashdata('status') == "hapusblok") { ?>
                    <div class="alert alert-success"><i class="fas fa-trash-alt"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
                <?php } ?>
            </div>
            <div class="pt-0 pl-2">
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#tambahblokmitra" role="button" style="font-size:14px" title="tambah blok/mitra">
                    Tambah Blok/Mitra
                </a>
            </div>
            <div class="table-responsive px-2 py-2">
                <table id="example" class="table-sm table-bordered nowrap" width="100%" cellspacing="0">
                    <thead>
                        <tr class='text-center'>
                            <th>No</th>
                            <th>Nama Blok/Mitra</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <?php $no = 1; foreach ($blokmitra as $row) {?> 
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?php echo $row->blokmitra; ?></td>
                                <td>
                                    <div class="text-center inline">
                                        <a href="#" data-toggle="modal" data-target="#editblokmitra" onclick="editblok(<?php echo $row->id_blokmitra; ?>)">
                                            <i class="fas fa-edit" style="color: #03ad30" title="edit"></i>
                                        </a>
                                        &nbsp;
                                        &nbsp;
                                        <a href="<?php echo site_url('tabelvarblok/hapus_blok/'.$row->blokmitra)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                                            <i class="fas fa-trash-alt" title="hapus" style="color: #ff6b6b"></i>
                                        </a>
                                    </div>
                                </td> 
                            </tr>
                        <?php  } ?>   
                    </tbody>
                </table>
            </div>
        <!-- Modal Tambah Blokmitra -->
            <div class="modal fade" role="dialog" id="tambahblokmitra">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Tambah Blok/Mitra</h4>
                            <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('tabelvarblok/tambah_blok') ?>
                            <div class="form-group">
                                <label class="control-label" for="tambahblokmitra">Nama Blok/Mitra</label>
                                <input type="text" name="tambahblokmitra" class="form-control" id="tambahblokmitra" required autofocus>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"> Simpan</button>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal Edit Blok/mitra -->
            <div class="modal fade" role="dialog" id="editblokmitra">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Edit Blok/Mitra</h4>
                            <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('tabelvarblok/update_blok') ?>
                            <div class="form-group">
                                <label class="control-label" for="blok">Nama Blok/Mitra</label>
                                <input type="text" name="blokmitra" class="form-control" id="blok" autofocus>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="idb"></label>
                                <input type="hidden" name="idb" class="form-control" id="idb" required readonly>
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
</div>
</div>
</div>



<script type="text/javascript">
//Edit Varietas
    function editvar(idvarietas) {
        $.ajax({
            url: "<?php echo site_url('tabelvarblok/edit_var'); ?>",
            type: "post",
            dataType: 'json',
            data: {id: idvarietas},
            cache: false,
            success: function(result) {
                $('#idv').val(result['id_varietas']);
                $('#var').val(result['varietas']);
            }
        });
    }


//Edit Blokmitra
    function editblok(idblokmitra) {
        $.ajax({
            url: "<?php echo site_url('tabelvarblok/edit_blok'); ?>",
            type: "post",
            dataType: 'json',
            data: {id: idblokmitra},
            cache: false,
            success: function(result) {
                $('#idb').val(result['id_blokmitra']);
                $('#blok').val(result['blokmitra']);
            }
        });
    }
</script>

