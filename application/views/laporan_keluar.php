<link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap-multiselect.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>

<?php if ($this->session->flashdata('status') == "berhasil") { ?>
    <div class="alert alert-success"><i class="fas fa-check"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
<?php } ?>
<div class="col">
    <div class="card shadow mb-4">
        <div class="tab-content" id="myTabContent">
            <!-- Project Card Pabrik -->
            <div class="tab-pane fade show active" id="pabrik" role="tabpanel" aria-labelledby="pabrik-tab">
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand">Laporan Barang Keluar</a>
                </nav>
                <br>
                <div class="container">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered table-hover text-center table-sm" id="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th rowspan="2">Tanggal Masuk</th>
                                        <th rowspan="2">Kode barang</th>
                                        <th rowspan="2">Jenis Olahan</th>
                                        <th colspan="2">Bobot(kg)</th>
                                        <th rowspan="2">Rendemen Akhir(%)</th>
                                    </tr>
                                    <tr>
                                        <th>Masuk</th>
                                        <th>Keluar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tampil as $t) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td><?php echo $t->tanggaldatang ?></td>
                                        <td><?php echo $t->kodebarang ?></td>
                                        <td><?php echo $t->jenisolahan ?></td>
                                        <td><?php echo $t->bobotdatang ?></td>
                                        <td><?php echo $t->bobot ?></td>
                                        <td><?php echo $t->rendemen ?></td>
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


<!-- Plugin JS DataTables -->
<script src="<?= base_url('assets/'); ?>vendor/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/js/buttons.flash.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/js/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/js/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/js/buttons.print.min.js"></script>

<script type="text/javascript">

$('#table').DataTable( {
    dom: 'lBfrtip',
    buttons: [
    'excel', 'pdf', 'print'
    ]
} );

</script>



