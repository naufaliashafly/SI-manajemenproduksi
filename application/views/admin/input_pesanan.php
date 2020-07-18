<style>
    .intabel{
        border: none;
        font-family: arial;
        color: #6e707e;
        width: 50px;
    }
    .inkode{
        border: none;
        font-family: arial;
        color: #6e707e;
    }
    .inkurang{
        border: none;
        width: 70px;
        font-family: arial;
        color: #6e707e;
        margin: auto;
    }
    .cekbox{
        font-size: 14px;
        margin: left;
    }
    .font-weight-bold{
        border: none;
        font-size: 18px;
    }
</style>



<div class="container">
    <?php if ($this->session->flashdata('status') == "berhasil") { ?>
        <div class="alert alert-success"><i class="fas fa-check"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
    <?php } ?>
    <?php if ($this->session->flashdata('status') == "hapus") { ?>
        <div class="alert alert-success"><i class="fas fa-trash-alt"></i>&nbsp;<?php echo $this->session->flashdata('message') ?></div>
    <?php } ?>

    <!-- INPUT PESANAN -->
    <div class="card shadow mb-4">
        <!-- Header -->
        <nav class="navbar navbar-light bg-light">
            <div class="col">
               <a class="navbar-brand">Input Permintaan Barang</a>
           </div>
        </nav>
        <!-- Body -->
        <div class="card-body">
            <div class="container">
                <!-- Form -->
                <?= form_open('pesanan/proses'); ?>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Varietas</label>
                            <select class="form-control select1" name="varietas" id="ckvar">
                                <option>---Varietas---</option>
                                <?php
                                foreach ($dd_varietas as $row) {
                                    echo "<option value='" . $row->varietas . "'>" . $row->varietas . "</option>";
                                }?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="control-label" for="tgl">Jenis olahan</label>
                            <div class="form-row">
                                <select class="form-control select2" name="jenisolahan" id="ckjenis">
                                    <option>---Jenis Olahan---</option>
                                    <?php
                                    foreach ($dd_jenisolahan as $row) {
                                        echo "<option value='" . $row->jenisolahan . "'>" . $row->jenisolahan . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <label class="control-label" for="tgl"></label>
                        <button type="button" class="btn btn-primary btn-md btn-block mt-2" id="cari" onclick="myfunc()">Cari</button>
                    </div>   
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Bobot yang di pesan</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="" id="input" name="input" oninput="hitung()">
                        </div>
                        <label for="exampleFormControlInput1">kg</label>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col">
                        <div class="container px-0" >
                            <div class="container border">
                                <h5>Kode Barang:</h5>
                                <p class="inkode pt-3" id="kodebar"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="box">
                            
                                <table table class="table-responsive table-bordered nowrap table-bordered table-sm table-hover" id="table" style="width: 100%">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">Proses</th>
                                            <th scope="col">Bobot tersedia (kg)</th>
                                            <th scope="col">Bobot di pesan (kg)</th>
                                            <th scope="col">Waktu (hari)</th>
                                            <th scope="col">Bobot sisa (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <th class="text-left">Jemur</th>
                                            <th><input class="intabel" id="jemur" readonly></th>
                                            <th><p class="inkurang" id="sjemur"></p></th>
                                            <th><p class="inkurang" id="wjemur"></th>
                                            <th><p class="inkurang" id="ssjemur"></th>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Huller</th>
                                            <th><input class="intabel" id="huller" readonly></th>
                                            <th><p class="inkurang" id="shuller"></p></th>
                                            <th><p class="inkurang" id="whuller"></th>
                                            <th><p class="inkurang" id="sshuller"></th>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Suton+Grading</th>
                                            <th><input class="intabel" id="suton" readonly></th>
                                            <th><p class="inkurang" id="ssuton"></p></th>
                                            <th><p class="inkurang" id="wsuton"></th>
                                            <th><p class="inkurang" id="sssuton"></th>
                                        </tr>
                                        <tr>
                                            <th class="text-left">CS+HP</th>
                                            <th><input class="intabel" id="cshp" readonly></th>
                                            <th><p class="inkurang" id="scshp"></p></th>
                                            <th><p class="inkurang" id="wcshp"></th>
                                            <th><p class="inkurang" id="sscshp"></th>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Ready</th>
                                            <th><input class="intabel" id="ready" readonly></th>
                                            <th><p class="inkurang" id="sready"></p></th>
                                            <th><p class="inkurang" id="wready"></p></th>
                                            <th><p class="inkurang" id="ssready"></p></th>
                                        </tr>
                                        <tr class="bg-light">
                                            <th class="text-left"  colspan="2">Barang Kurang</th>
                                            <th><p class="inkurang" id="bobotkurang"></p></th>
                                            <th><p class="inkurang" id="wbkurang"></p></th>
                                            <th></th>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <table class="table table-sm">
                                        <thead class="thead-light">                 
                                            <tr>
                                                <th>Waktu olahan:</th>
                                                <th><p class="inkurang" id="waktu"></th>
                                                <th>hari</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <br> 
                <div class="form-group ">
                    <label for="exampleFormControlInput1">Tanggal pesanan masuk</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="date" class="form-control" name="tanggalpesan" id="tanggalpesan" oninput="myFunction()">
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="exampleFormControlInput1">Bobot</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="" id="bobotpesan" name="bobotpesan" oninput="myFunction()">
                        </div>
                        <label for="exampleFormControlInput1">kg</label>
                    </div>
                </div> -->
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tanggal perkiraan kirim</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="date" class="form-control" name="tanggalkirim" id="tanggalkirim" oninput="myFunction()">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Catatan</label>
                    <input type="text" class="form-control" placeholder="" id="bobotdatang" name="bobotdatang" oninput="myFunction()">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kode Pesanan</label>
                    <p id="demo" class="font-weight-bold"></p>
                    <script>
                        function myFunction() {
                            var tanggalpesan = document.getElementById("tanggalpesan").value;
                            var bobotpesan = document.getElementById("input").value;
                            var varietas = document.getElementById("ckvar").value;
                            var jenisolahan = document.getElementById("ckjenis").value;
                            document.getElementById("demo").innerHTML = varietas + jenisolahan + bobotpesan + tanggalpesan ;
                        }
                    </script>
                </div>
                <div class="checkbox py-3">
                    <!-- Input by, valuenya diisi pake id_usernya dia -->
                    <label> 
                        <input type="checkbox" name="id_user" value="<?= $user->id_user ?>" required="Isi sebagai penanggungjawab penginput data"> Data di input oleh <?= $user->nama ?>
                    </label>
                </div>
                <div>
                    <input type="hidden" name="status" class="form-control" value="di input" required readonly>
                    <button type="submit" name="simpan" class="btn btn-primary btn-md btn-block">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>


<!-- simpenan bobot stok sembunyi --> 
<input class="intabel" id="jenis" hidden="">



<script type="text/javascript">

    function myfunc() {
        var vars = document.getElementById("ckvar");
        var jens = document.getElementById("ckjenis");
        var x = vars.options[vars.selectedIndex].value;
        var y = jens.options[jens.selectedIndex].value;

        $.ajax({
        url: "<?php echo site_url('pesanan/cek'); ?>",
        type: "post",
        dataType: 'json',
        data: {ckvar: x, ckjenis: y},
        cache: false,
        success: function(result) {
            $('#jenis').val(result['jenisolahan']);
            $('#jemur').val(result['bobotjemur']);
            $('#huller').val(result['bobothuller']);
            $('#suton').val(result['bobotsuton']);
            $('#cshp').val(result['bobotcshp']);
            $('#ready').val(result['bobotready']);


            $.ajax({
                url: "<?php echo site_url('pesanan/cari'); ?>",
                type: "post",
                dataType: 'json',
                data: {ckvar: x, ckjenis: y},
                cache: false,
                success: function(result) {
                    var len = result.length;
                    for(var i=0; i<len; i++){
                        var id          = result[i].id_barangdatang;
                        var kodebarang  = result[i].kodebarang;
                        var proses      = result[i].proses;
                        var bobotdatang = result[i].bobotdatang;


                        var tr_str = 
                        "<div class='form-check'> <input type='checkbox' name='kodebarang[]' value='" + id + "'>" + " " + "<b>" + bobotdatang + "</b>" + " " + " " + "<b>[" + proses + "]</b>" + " " + "<label>" + kodebarang;

                        $("#kodebar").append(tr_str);
                    }
                }
            });
        }
    });   
    }

function hitung(result) {

    var input = document.getElementById("input").value;
    var jenisolahan = document.getElementById("jenis").value;


    ///READY///
    var bobotready = document.getElementById("ready").value; //stok asli pabrik
    var stready = +bobotready - +input; //stok berubah
    var ssready;
    if (stready< 0) {ssready = 0;} else { ssready = stready};
    var sready; //stok terpakai
    if (stready <= 0) { sready = +bobotready; } else { sready = +input; };
    var wready = sready*0;


    ///CSHP///
    var bobotcshp = document.getElementById("cshp").value; //stok asli pabrik
    var stcshp; //stok berubah
    if (stready<= 0) { stcshp = +stready + +bobotcshp;} else { stcshp = +bobotcshp; };
    var sscshp;
    if (stcshp< 0) {sscshp = 0;} else { sscshp = stcshp};
    var scshp; //stok terpakai
    if (stcshp< 0) { scshp = Math.abs(stready) + +stcshp;} else { scshp = +input - sready;};
    var pcshp = 7200;
    var wkcshp = scshp/pcshp;
    var wcshp = wkcshp.toFixed(2);


    ///SUTON///
    var bobotsuton = document.getElementById("suton").value; //stok asli pabrik
    var stsuton; //stok berubah
    if (stcshp <= 0) { stsuton = +stcshp + +bobotsuton;} else {stsuton = +bobotsuton;};
    var sssuton;
    if (stsuton< 0) {sssuton = 0;} else { sssuton = stsuton};
    var ssuton; //stok terpakai
    if (stsuton< 0) { ssuton = Math.abs(stcshp) + +stsuton;} else { ssuton = +input - (+sready + +scshp); };
    var psuton = 10000;
    var wksuton = (ssuton/psuton) + (ssuton/pcshp);
    var wsuton = wksuton.toFixed(2);


    ///HULLER///
    var bobothuller = document.getElementById("huller").value; //stok asli pabrik
    var sthuller; //stok berubah
    if (stsuton<= 0) { sthuller = +stsuton + +bobothuller;} else { sthuller = +bobothuller };
    var sshuller;
    if (sthuller< 0) {sshuller = 0;} else { sshuller = sthuller};
    var shuller; //stok terpakai
    if (sthuller< 0) { shuller = Math.abs(stsuton) + +sthuller;} else { shuller = +input - (+sready + +scshp + +ssuton); };
    var phuller;
    if (jenisolahan === "SW") { phuller = 12500; } else { phuller = 2500};
    var wkhuller = (shuller/phuller) + (shuller/psuton) + (shuller/pcshp);
    var whuller = wkhuller.toFixed(2);


    ///JEMUR///
    var bobotjemur = document.getElementById("jemur").value; //stok asli pabrik
    var stjemur; //stok berubah
    if (sthuller<= 0) { stjemur = +sthuller + +bobotjemur;} else { stjemur = +bobotjemur; };
    var ssjemur;
    if (stjemur< 0) {ssjemur = 0;} else { ssjemur = stjemur};
    var sjemur; //stok terpakai
    if (stjemur< 0) { sjemur = Math.abs(sthuller) + +stjemur;} else { sjemur = +input - (+sready + +scshp + +ssuton + +shuller); };
    var pjemur; 
    if (sjemur< 0) { if (jenisolahan === "Natural" ) { pjemur = 20;} else if( jenisolahan === "Honey") { pjemur = 15; } else { pjemur = 7.5;} } else { pjemur = 0; };
    var wkjemur = (pjemur) + (sjemur/phuller) + (sjemur/psuton) + (sjemur/pcshp);
    var wjemur = wkjemur.toFixed(2);


    ///KURANG///
    var kurang = +input - (+bobotready + +bobotjemur + +bobothuller + +bobotsuton + +bobotcshp);
    var bobotkurang;
    if (kurang <= 0) { bobotkurang = 0; } else { bobotkurang = kurang; };
    var pjemurk; 
    if (jenisolahan === "Natural" ) { pjemurk = 20;} else if( jenisolahan === "Honey") { pjemurk = 15; } else { pjemurk = 7.5; };
    var wkkurang;
    if (bobotkurang <= 0 ) { wkkurang = 0;} else { wkkurang =  pjemurk + (bobotkurang/phuller) + (bobotkurang/psuton) + (bobotkurang/pcshp);};
    var wkurang = wkkurang.toFixed(2);


    ///estimasi waktu///
    var wk = wkkurang + wkjemur + wkhuller + wksuton + wkcshp;
    var waktu = wk.toFixed(2);


    ///bobot yang terpakai ///
    // document.getElementById("stready").innerHTML = stready;
    // document.getElementById("stcshp").innerHTML = stcshp;
    // document.getElementById("stsuton").innerHTML = stsuton;
    // document.getElementById("sthuller").innerHTML = sthuller;
    // document.getElementById("stjemur").innerHTML = stjemur;

    ///bobot sisa///
    document.getElementById("ssready").innerHTML = ssready;
    document.getElementById("sscshp").innerHTML = sscshp;
    document.getElementById("sssuton").innerHTML = sssuton;
    document.getElementById("sshuller").innerHTML = sshuller;
    document.getElementById("ssjemur").innerHTML = ssjemur;


    ///bobot yang terpakai ///
    document.getElementById("sready").innerHTML = sready;
    document.getElementById("scshp").innerHTML = scshp;
    document.getElementById("ssuton").innerHTML = ssuton;
    document.getElementById("shuller").innerHTML = shuller;
    document.getElementById("sjemur").innerHTML = sjemur;
    document.getElementById("bobotkurang").innerHTML = bobotkurang + +pjemur;


    ///estimasi waktu olah///
    document.getElementById("wready").innerHTML = wready;
    document.getElementById("wcshp").innerHTML = wcshp;
    document.getElementById("wsuton").innerHTML = wsuton;
    document.getElementById("whuller").innerHTML = whuller;
    document.getElementById("wjemur").innerHTML = wjemur;
    document.getElementById("waktu").innerHTML = waktu;

}

</script>
