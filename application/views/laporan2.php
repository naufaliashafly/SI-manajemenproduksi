<!-- <link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap-multiselect.css" rel="stylesheet" /> -->
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>


<div class="col">
	<div class="card shadow mb-4">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="full-tab" data-toggle="tab" href="#full" role="tab" aria-controls="full" aria-selected="true">Laporan keseluruhan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " id="rendemen-tab" data-toggle="tab" href="#rendemen" role="tab" aria-controls="rendemen" aria-selected="false">Rendemen per-Blok/Mitra</a>
			</li>
		</ul>
		<!-- KONTEN -->
		<div class="tab-content" id="myTabContent">
            <!-- Project Card Laporan -->
            <div class="tab-pane fade show active" id="full" role="tabpanel" aria-labelledby="full-tab">
                <nav class="navbar navbar-light bg-light pb-2">
                    <a class="navbar-brand">Laporan</a>
                </nav>
                <div class="card-body">    
                    <div class="table-responsive">
                        <table class="table-responsive table-sm nowrap table table-bordered table-striped" id="example" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center" rowspan="3">#</th>
                                    <th class="text-center" colspan="3" rowspan="2">Data Barang</th>
                                    <th class="text-center" colspan="3" rowspan="2">Barang Datang</th>
                                    <th class="text-center" colspan="4" rowspan="2">Penjemuran</th>
                                    <th class="text-center" colspan="3" rowspan="2">Huller</th>
                                    <th class="text-center" colspan="10">Suton-Grading</th>
                                    <th class="text-center" colspan="2" rowspan="2">CS+HP</th>
                                    <th class="text-center" rowspan="3">Rendemen Akhir</th>
                                </tr>
                                <tr>
                                    <th class="text-center" rowspan="2">Tanggal</th>
                                    <th class="text-center" colspan="8">Bobot</th>
                                    <th class="text-center" rowspan="2">Rendemen</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Varietas</th>
                                    <th>Blok/Mitra</th>
                                    <th>Jenis Olahan</th>
                                    <th>Tanggal</th>
                                    <th>Bobot</th>
                                    <th>Kadar Air</th>
                                    <th>Tanggal Jemur</th>
                                    <th>Tanggal Kering</th>
                                    <th>Bobot Kering</th>
                                    <th>Rendemen Kering</th>
                                    <th>Tanggal</th>
                                    <th>Bobot</th>
                                    <th>Rendemen</th>
                                    <th>MB</th>
                                    <th>BB</th>
                                    <th>PB</th>
                                    <th>L2</th>
                                    <th>L3</th>
                                    <th>PBK</th>
                                    <th>ELV</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                    <th>Bobot</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($tampil as $row) {?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->varietas ?></td>
                                        <td><?= $row->blokmitra ?></td>
                                        <td><?= $row->jenisolahan ?></td>
                                        <td><?= $row->tanggaldatang ?></td>
                                        <td><?= $row->bobotdatang ?></td>
                                        <td><?= $row->kadarairawal ?></td>
                                        <td><?= $row->tanggalmasukjemuran ?></td>
                                        <td><?= $row->tanggalkering ?></td>
                                        <td><?= $row->bobotkering ?></td>
                                        <td><?= $row->rendemenkering ?> %</td>
                                        <td><?= $row->tanggalhuller ?></td>
                                        <td><?= $row->bobothuller ?></td>
                                        <td><?= $row->rendemenhuller ?> %</td>
                                        <td><?= $row->tanggalsutongrading ?></td>
                                        <td><?= $row->MB ?></td>
                                        <td><?= $row->BB ?></td>
                                        <td><?= $row->PB ?></td>
                                        <td><?= $row->L2 ?></td>
                                        <td><?= $row->L3 ?></td>
                                        <td><?= $row->PBK ?></td>
                                        <td><?= $row->ELV ?></td>
                                        <td><?= $row->bobotsutongrading ?></td>
                                        <td><?= $row->rendemensutongrading ?> %</td>
                                        <td><?= $row->tanggalcshp ?></td>
                                        <td><?= $row->bobotcshp ?></td>
                                        <td><?= $row->rendemencshp ?> %</td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Project Card Grafik -->
            <div class="tab-pane fade " id="rendemen" role="tabpanel" aria-labelledby="rendemen-tab">
                <nav class="navbar navbar-light bg-light pb-2">
                    <a class="navbar-brand">Grafik Blok/Mitra</a>
                </nav>
                <div class="card-body">
                    <div class="form-row border border-light pl-2 pt-3 mb-3">
                        <div class="form-check form-check-inline pb-2">
                            <label> Tampilkan grafik blok/mitra:</label> &nbsp &nbsp
                            <input type="checkbox" id="AI"  onclick="AI()"> AI &nbsp
                            <input type="checkbox" id="P7" onclick="P7()"> PAL7 &nbsp
                            <!-- <input type="checkbox" id="GPT" onclick="GPT()"> G. Puntang &nbsp
                            <input type="checkbox" id="GCP" onclick="GCP()"> G. Cupu &nbsp -->
                        </div>
                    </div>
                    <a id="aAI" class="pb-3" style="display:none">
                        <div class="card" >
                            <h5 class="card-header">Blok/Mitra: AI</h5>
                            <div class="card-body">
                                <?= form_open('laporan/bloktahun'); ?>
                                <!-- <div class="row">
                                    <div class="col-2 pr-0">
                                        <select class="form-control select1" name='tahun'>
                                            <option>---Tahun---</option>
                                            <option value="2019">
                                                2019  
                                            </option>";
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" name="input" class="btn btn-primary btn-md btn-block" >Tampilkan</button>
                                    </div>
                                </div> -->
                                <?= form_close(); ?>
                                <div class="form-row mt-1 pb-3">
                                    <canvas id="grafik1">
                                        <?php foreach($chart1 as $c) { 
                                            $rendemen1[] = $c->rendemenbulanan;
                                            $tanggal1[] = $c->bulan;
                                        }?>
                                        <?php foreach($chart2 as $c) { 
                                            $rendemen2[] = $c->rendemenbulanan;
                                            $tanggal2[] = $c->bulan;
                                        }?>
                                    </canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                    <br>
                    <a id="aP7" style="display:none">
                        <div class="card">
                            <h5 class="card-header">Blok/Mitra: PAL7</h5>
                            <div class="card-body">
                                <div class="form-row pt-3 pb-3">
                                    <canvas id="grafik2">
                                        <?php foreach($chart3 as $c) { 
                                            $rendemen3[] = $c->rendemenbulanan;
                                            $tanggal3[] = $c->bulan;
                                        }?>
                                        <?php foreach($chart4 as $c) { 
                                            $rendemen4[] = $c->rendemenbulanan;
                                            $tanggal4[] = $c->bulan;
                                        }?>
                                    </canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                    <br>
                    <a id="aGPT" style="display:none">
                        <div class="card">
                            <h5 class="card-header">Blok/Mitra: G.Puntang</h5>
                            <div class="card-body">
                                <div class="form-row pt-3 pb-3">
                                    <canvas id="grafik3">
                                        <?php foreach($chart5 as $c) { 
                                            $rendemen5[] = $c->rendemenbulanan;
                                            $tanggal5[] = $c->bulan;
                                        }?>
                                        <?php foreach($chart4 as $c) { 
                                            $rendemen6[] = $c->rendemenbulanan;
                                            $tanggal6[] = $c->bulan;
                                        }?>
                                    </canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                    <br>
                    <a id="aGCP" style="display:none">
                        <div class="card">
                            <h5 class="card-header">Blok/Mitra: G.Cupu</h5>
                            <div class="card-body">
                                <div class="form-row pt-3 pb-3">
                                    <canvas id="grafik4">
                                        <?php foreach($chart7 as $c) { 
                                            $rendeme7[] = $c->rendemenbulanan;
                                            $tanggal7[] = $c->bulan;
                                        }?>
                                        <?php foreach($chart4 as $c) { 
                                            $rendemen8[] = $c->rendemenbulanan;
                                            $tanggal8[] = $c->bulan;
                                        }?>
                                    </canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
	</div>
</div>

<!-- Chart JS -->
<script src="<?= base_url('assets/'); ?>vendor/chartjs/Chart.bundle.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/chartjs/Chart.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/chartjs/Chart.bundle.min.js"></script>


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

$('#example').DataTable( {
    dom: 'lBfrtip',
    buttons: [
    'excel', 'pdf', 'print'
    ]
} );

///checkbox
function AI() {
  var checkBox = document.getElementById("AI");
  var text = document.getElementById("aAI");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}

function P7() {
  var checkBox = document.getElementById("P7");
  var text = document.getElementById("aP7");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}

function GCP() {
  var checkBox = document.getElementById("GCP");
  var text = document.getElementById("aGCP");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}

function GPT() {
  var checkBox = document.getElementById("GPT");
  var text = document.getElementById("aGPT");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}



/// Chart JS AI - ADS,ATS
var ctx1 = document.getElementById('grafik1');
var myChart1 = new Chart(ctx1, {
	type: 'bar',
	data: {
		labels: <?php echo json_encode($tanggal1);?>,
		datasets: [{
			label: 'ADS',
			data: <?php echo json_encode($rendemen1);?>,
			backgroundColor:'rgba(255, 100, 100, 0.7)',
			borderWidth: 1
		},{
			label: 'ATS',
			data: <?php echo json_encode($rendemen2);?>,
			backgroundColor:'rgba(100, 255, 100, 0.7)',
			borderWidth: 1
		}]
	},
	options: {
		scales: {
			yAxes: [{
				ticks: {
					min : 30,
					max : 100
				},
				scaleLabel: {
					display: true,
					labelString: 'Rendemen (%)'
				}
			}]
		},
		plugins: {
			datalabels: {
				anchor: 'end',
				align: 'top',
				formatter: Math.round,
				font: {
					weight: 'bold'
				}
			}
		}
	}
});


/// Chart JS AI - ADS,ATS
var ctx2 = document.getElementById('grafik2');
var myChart1 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($tanggal3);?>,
        datasets: [{
            label: 'ADS',
            data: <?php echo json_encode($rendemen3);?>,
            backgroundColor:'rgba(255, 100, 100, 0.7)',
            borderWidth: 1
        },{
            label: 'ATS',
            data: <?php echo json_encode($rendemen4);?>,
            backgroundColor:'rgba(100, 255, 100, 0.7)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    min : 30,
                    max : 100
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Rendemen (%)'
                }
            }]
        },
        plugins: {
            datalabels: {
                anchor: 'end',
                align: 'top',
                formatter: Math.round,
                font: {
                    weight: 'bold'
                }
            }
        }
    }
});




</script>