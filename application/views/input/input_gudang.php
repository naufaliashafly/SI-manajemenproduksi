<body>
    <div class="container">
        <!-- Project Card Input Gudang -->
        <div class="card shadow mb-4">
            <nav class="navbar navbar-light bg-light">
                <div class="col">
                 <a class="navbar-brand">Input Gudang</a>
             </div>
            </nav>
        <!-- Project Card Input Data -->
        <div class="card-body">
            <div class="container">
                <?= form_open('inputgudang/proses'); ?>
                <div class="form-group">
                    <label class="control-label">Kode Barang:</label><br>
                    <?php foreach ($dd_kodebarang as $row) { ?>
                        <input type="checkbox" name="kodebarang[]" class="flat-red" value="<?php echo $row->id_barangdatang ?>"> <b> [ <?php echo $row->kode ?> &nbsp <?php echo $row->bobot ?> ] </b> <?php echo $row->kodebarang ?> <br>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Letak Gudang</label>
                    <select class="form-control select2" name="letakgudang" id="letakgudang">
                        <option>---Letak Gudang---</option>
                        <?php
                        foreach ($dd_letakgudang as $row) {
                            echo "<option value='" . $row->id_letakgudang . "'>" . $row->letakgudang . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Bobot</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="bobot">
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
                    <button type="submit" class="btn btn-primary btn-md btn-block">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>


    