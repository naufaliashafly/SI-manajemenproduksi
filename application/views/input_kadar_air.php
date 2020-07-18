<body>
    <div class="col">
        <div class="card shadow mb-4">
            <div class="form-group">
                <?php foreach($tampil as $row) { ?>
                <?php } ?>
                <div class="card-header bg-light py-3 d-flex flex-row align-items-center justify-content-between">
                    <label class="inline font-weight-bold"><!-- <?= $row->posisibarang ?> --></label>
                    <a class="inline"> <!-- <?= $row->jenisolahan ?> -->  </a>
                </div>
                <div class="container mt-2">
                    <div>
                        <label class="inline">Tanggal Masuk Jemuran</label>
                        <a class="inline"><!-- <?= $row->tanggalmasukjemuran ?> --></a>
                    </div>
                    <!-- Tabel !-->
                    <div class="container border border-light">
                        <table class="table table-borderless text-center">
                            <tr>
                                <th>Hari ke-</th>
                                <th>Kadar air</th>
                            </tr>
                            <tr>
                                <td><!-- <?= $row->harike ?> --> </td>
                                <td><!-- <?= $row->kadarair ?> --> %</td>
                            </tr>
                        </table>
                       <!--  <?= form_open('inputkadarair/proses','', array('id' =>$row->id_barangjemur)); ?> -->
                        <div class="row mb-2 text-center">
                            <div class="col-6">
                                <input type="text" class="form d-inline-flex" placeholder="Hari ke-" id="harike" name="harike">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form d-inline-flex" placeholder="Kadar air" id="kadarair" name="kadarair">
                            </div>
                        </div>
                        <div>
                            <button type="submit" name="input" class="btn btn-primary btn-md btn-block mt-3">Simpan</button>
                        </div>
                        <br>
                        <?= form_open(); ?>
                    </div>     
                </div>
            </div>
        </div>
    </div>