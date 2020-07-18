function cek() {
    var x = document.getElementById("varjenis").value;
    
    $.ajax({
        url: "<?php echo site_url('pesanan/cek'); ?>",
        type: "post",
        dataType: 'json',
        data: {id: x},
        cache: false,
        success: function(result) {
            $('#jemur').val(result['bobotjemur']);
            $('#huller').val(result['bobothuller']);
            $('#suton').val(result['bobotsuton']);
            $('#cshp').val(result['bobotcshp']);
            $('#ready').val(result['bobotready']);
        }
    });
}

function hitung(result) {
    ///ngitung waktu dan stok
    var input = document.getElementById("input").value;
    var bobotjemur = document.getElementById("jemur").value;
    var bobothuller = document.getElementById("huller").value;
    var bobotsuton = document.getElementById("suton").value;
    var bobotcshp = document.getElementById("cshp").value;
    var bobotready = document.getElementById("ready").value;
    document.getElementById("demo").innerHTML = "You wrote: " + input + " = " + bobotjemur + " = " + bobothuller + " = " + bobotsuton + " = " + bobotcshp + " = " + bobotready;

}