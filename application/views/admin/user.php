
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="form-row">
                    <h6 class="m-0 font-weight-bold text-primary">Kelola Pengguna</h6>
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
                    <div class="alert alert-secondary"><i class="fas fa-trash-alt"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
                <?php } ?>
            </div>
            <div class="pt-0 pl-2">
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#tambahvarietas"  style="font-size:14px" title="tambah varietas">
                    Tambah Pengguna
                </a>
            </div>
            <div class="table-responsive px-2 py-2">
                <table id="example" class="table table-bordered table-sm nowrap" width="100%" cellspacing="0" style="width:100%">
                    <thead>
                        <tr class='text-center'>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Jabatan</th>
                            <th>No HP</th>
                            <th>Password</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <?php $no = 1; foreach ($user as $row) {?> 
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?php echo $row->nama; ?></td>
                                <td><?php echo $row->username; ?></td>
                                <td><?php echo $row->role; ?></td>
                                <td><?php echo $row->HP; ?></td>
                                <td><?php echo $row->password; ?></td>
                                <td>
                                    <div class="text-center inline">
                                        <a href="#" data-toggle="modal" data-target="#editvarietas" onclick="edit(<?php echo $row->id_user; ?>)">
                                            <i class="fas fa-edit" style="color: #03ad30" title="edit"></i>
                                        </a>
                                        &nbsp;
                                        &nbsp;
                                        <a href="<?php echo site_url('user/hapus/'.$row->id_user)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                                            <i class="fas fa-trash-alt" title="hapus" style="color: #ff6b6b"></i>
                                        </a>
                                    </div>
                                </td> 
                            </tr>
                        <?php  } ?>   
                    </tbody>
                </table>
            </div>
        <!-- Modal Tambah Pengguna -->
            <div class="modal fade" role="dialog" id="tambahvarietas">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Tambah User</h4>
                            <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <?= form_open('user/proses'); ?>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Jabatan</label>
                                <div class="form-row">
                                    <div class="col">
                                        <select class="form-control select1" name="jabatan" id="jabatan"  required>
                                            <option>---Jabatan---</option>
                                            <?php
                                            foreach ($dd_jabatan as $row) {
                                                echo "<option value='" . $row->id_userrole . "'>" . $row->role . "</option>";
                                            }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">No HP</label>
                                <input type="text" name="HP" id="HP" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required autofocus>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                Tambah Pengguna
                            </button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal Edit Pengguna -->
            <div class="modal fade" role="dialog" id="editvarietas">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Edit Varietas</h4>
                            <button type="button" data-dismiss="modal" class="close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('user/update') ?>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama</label>
                                <input type="text" name="nama" id="nam" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Username</label>
                                <input type="text" name="username" id="us" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="tgl">Jabatan</label>
                                <div class="form-row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="jab" readonly>
                                    </div>
                                    <div class="col">
                                        <select class="form-control select2" name="jabatan">
                                            <option>---Jabatan---</option>
                                            <?php foreach ($dd_jabatan as $row) {
                                                echo "<option value='" . $row->id_userrole . "'>" . $row->role . "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">No HP</label>
                                <input type="text" name="HP" id="hap" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Password</label>
                                <input type="text" name="password" id="pas" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="idu"></label>
                                <input type="hidden" name="id_user" class="form-control" id="idu" required readonly>
                                <button type="submit"class="btn btn-success"></i> Simpan</button>
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



<script type="text/javascript">
//Edit Varietas
    function edit(id) {
        $.ajax({
            url: "<?php echo site_url('user/edit'); ?>",
            type: "post",
            dataType: 'json',
            data: {id: id},
            cache: false,
            success: function(result) {
                $('#idu').val(result['id_user']);
                $('#nam').val(result['nama']);
                $('#us').val(result['username']);
                $('#jab').val(result['role']);
                $('#hap').val(result['HP']);
                $('#pas').val(result['password']);
            }
        });
    }
</script>

