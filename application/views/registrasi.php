<body class="bg-gradient-success">
    <div class="col-xl-8 mx-auto">
        <div class="card shadow mb-4">
            <div class=" row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Silahkan Registrasi</h1>
                        </div>
                        <?= form_open('registrasi/proses'); ?>
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
                            Registrasi
                        </button>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>