<?php include("header.php") ?>
<?php
$nama       = "";
$product    = "";
$jenis      = "";
$stok       = "";
$keterangan = "";
$error      = "";
$sukses     = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = "";
}

if($id != ""){
    $sql1   = "select * from halaman where id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $nama   = $r1['nama'];
    $product    = $r1['product'];
    $jenis      = $r1['jenis'];
    $stok       = $r1['stok'];
    $keterangan = $r1['keterangan'];

    if($keterangan == ''){
        $error  = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $nama       = $_POST['nama'];
    $product    = $_POST['product'];
    $jenis      = $_POST['jenis'];
    $stok       = $_POST['stok'];
    $keterangan = $_POST['keterangan'];

    if ($nama == '') {
        $error     = "Silakan masukkan data dengan benar!";
    }

    if (empty($error)) {
        if($id != ""){
            $sql1   = "update halaman set nama = '$nama',product='$product',jenis ='$jenis',stok='$stok',keterangan='$keterangan',tgl_isi=now() where id = '$id'";
        }else{
            $sql1       = "insert into halaman(nama,product,jenis,stok,keterangan) values ('$nama','$product','$jenis','$stok','$keterangan')";
        }
        
        $q1         = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses     = "Sukses memasukkan data";
        } else {
            $error      = "Gagal memasukkan data";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title> ADMIN </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<h1>Halaman Admin Input Data</h1>
<div class="mb-3 row">
    <a href="index.php">
        Kembali ke halaman admin</a>
</div>
<?php
if ($error) {
?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
<?php
}
?>
<?php
if ($sukses) {
?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
<?php
}
?>
<form action="" method="post">
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" value="<?php echo $nama ?>" name="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="product" class="col-sm-2 col-form-label">Product</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="product" value="<?php echo $product ?>" name="product">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="jenis" id="jenis1" value="bunga hidup">
      <label class="form-check-label" for="jenis1">
        Bunga Hidup
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="jenis" id="jenis2" value="bunga plastik">
      <label class="form-check-label" for="jenis2">
        Bunga Plastik
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="jenis" id="jenis3" value="request">
      <label class="form-check-label" for="jenis3">
        Request
      </label>
    </div>
    <div class="mb-3 row">
        <label for="stok" class="col-sm-2 col-form-label">Ketersedian</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="stok" value="stok ada" id="stok1">
      <label class="form-check-label" for="stok1">
        Stok Ada
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="stok" value="stok habis" id="stok2">
      <label class="form-check-label" for="stok2">
        Stok Habis
      </label>
    </div>
    <div class="mb-3 row">
        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
        <div class="col-sm-10">
            <textarea name="keterangan" class="form-control" id="summernote"><?php echo $keterangan ?></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
        </div>
    </div>
</form>
<?php include("footer.php") ?>