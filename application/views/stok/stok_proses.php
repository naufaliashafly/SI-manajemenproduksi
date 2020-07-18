<link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap-multiselect.css" rel="stylesheet" />

<div class="col">
    <div class="card shadow mb-4">
        <div class="tab-content" id="myTabContent">
            <!-- Project Card Pabrik -->
            <div class="tab-pane fade show active" id="pabrik" role="tabpanel" aria-labelledby="pabrik-tab">
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand">Stok Barang Proses</a>
                </nav>
                <br>
                <div class="container">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered table-hover text-center table-sm" id="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th rowspan="2">Varietas</th>
                                        <th rowspan="2">Jenis Olahan</th>
                                        <th colspan="4">Bobot (kg)</th>
                                    </tr>
                                    <tr>
                                        <th>Jemur</th>
                                        <th>Huller</th>
                                        <th>Suton+Grading</th>
                                        <th>CS+HP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tampil as $t) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td><?php echo $t->varietas ?></td>
                                        <td><?php echo $t->jenisolahan ?></td>
                                        <td><?php echo $t->bobotjemur ?></td>
                                        <td><?php echo $t->bobothuller ?></td>
                                        <td><?php echo $t->bobotsuton ?></td>
                                        <td><?php echo $t->bobotcshp ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



