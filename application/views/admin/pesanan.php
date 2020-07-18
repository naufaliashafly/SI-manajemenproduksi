<link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap-multiselect.css" rel="stylesheet" />
<?php if ($this->session->flashdata('status') == "berhasil") { ?>
    <div class="alert alert-success"><i class="fas fa-check"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
<?php } ?>
<div class="col">
    <div class="card shadow mb-4">
        <div class="tab-content" id="myTabContent">
            <!-- Project Card Pabrik -->
            <div class="tab-pane fade show active" id="pabrik" role="tabpanel" aria-labelledby="pabrik-tab">
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand">Pesanan Barang</a>
                </nav>
                <br>
                <div class="container pb-4">
                	<div class="row">
                		<div class="col">
                			<div class="list-group" id="list-tab" role="tablist">
                				<?php $no = 1;
                				foreach ($tampil as $t) { ?>
                					<a class="list-group-item list-group-item-action" id="kodebarang" data-toggle="list" href="#list-home" role="tab" aria-controls="home" id="kodepesan" onclick="kodebarang(<?php echo $t->id_pesanan ?>)">
                						<div class="row">
                							<div class="col-4">
                								<h5 class="mb-1">Kode Pesan</h5>
                								<p class="mb-1">Tanggal Pesan</p>
                								<p class="mb-1">Bobot Pesan</p>
                							</div>
                							<div class="col-1">
                								<h5 class="mb-1">:</h5>
                								<p class="mb-1">:</p>
                								<p class="mb-1">:</p>
                							</div>
                							<div class="col">
                								<h5 class="mb-1"><?php echo $t->kodepesan ?></h5>
                								<p class="mb-1"><?php echo $t->tanggalpesan ?></p>
                								<p class="mb-1"><?php echo $t->bobotpesan ?></p>
                							</div>
                						</div>	
                					</a>
                				<?php } ?>
                			</div>
                		</div>
                		<div class="col">
                			<div class="tab-content" id="nav-tabContent">
                				<h5>Kode Barang:</h5>
                				<div class="border border-secondary  rounded">
                				<p class="container pt-3" id="demo"></p>
                				</div>
                			</div>
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    
	function kodebarang(idbarang) {
		var x = idbarang.value;

		$.ajax({
			url: "<?php echo site_url('pesanan/kodepesan'); ?>",
			type: "post",
			dataType: 'json',
			data: {id: idbarang},
			cache: false,
			success: function(result) {
				var len = result.length;
				for(var i=0; i<len; i++){
					var id          = result[i].id_barangdatang;
					var kodebarang  = result[i].kodebarang;


					var tr_str = 
					"<li type='1'> <label> &nbsp" + kodebarang + "</label> </li>";


					$("#demo").append(tr_str);
				}
			}
		});

		$("a").click(function(){
			$("#demo").empty();
		});
	}


</script>



