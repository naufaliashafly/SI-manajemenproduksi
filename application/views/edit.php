<?php
//memasukkan koneksi database
require_once("koneksi.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if($_POST['id']){
  //membuat variabel id berisi post['id']
  $id = $_POST['id'];
  //query standart select where id
  $view = $koneksi->query("SELECT * FROM varietas WHERE varietas='$varietas'");
  //jika ada datanya
  if($view->num_rows){
    //fetch data ke dalam veriabel $row_view
    $row_view = $view->fetch_assoc();
    //menampilkan data dengan table
    echo '
    <p>Berikut ini adalah detail dari data siswa <b>'.$row_view['varietas'].'</b></p>
    <table class="table table-bordered">
    </table>
    ';
  }
}
?>