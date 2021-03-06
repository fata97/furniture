<?php
session_start();
if(isset($_SESSION['id_pembeli'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Pemesanan</title>
	<meta name="description" content="Distro, cikarang, terlengkap, information, technology, jababeka, baru, murah"/>
	<meta name="keywords" content="Kaos, Murah, Cikarang, Baru, terlengkap, harga, terjangkau" />
	<meta name="author" content="Hakko Bio Richard"/>
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content=""/>
	<meta property="og:description" content=""/>
	<meta property="og:type" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:image" content=""/>
	<!-- end: Facebook Open Graph -->

    <!-- start: CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">

    	hr {
    		border: solid 2px black;
    	}
    	.box1 {
    		width: 400px;
    		height: 250px;
    		margin-right: 20px;
    	}

    	.box2 {
    		width: 400px;
    		height: 250px;
    		margin-right: 20px;
    	}

    	.parent {
    		display: flex;
    		margin: 20px;
    	}

        .row {
            border: solid 2px black;
            padding: 20px;
        }
    </style>
</head>
<body>

	<!--start: Header -->


	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<center><h2><i class=""></i>Furniture Suka Mundur Kadang Maju</h2></center>

			</div>
			<!-- end: Container  -->

		</div>

	</div>
	<!-- end: Page Title -->

	<!--start: Wrapper-->
	<div id="wrapper">

		<!--start: Container -->
    	<div class="container">

      		<!-- start: Row -->

      		<div class="row">
            <div class="col-sm-6">

                    <table>
                    	<h2>Pemesanan <hr>Metode Pembayaran</h2>
                        <p>Kami menerima pembayaran melalui transfer rekening bank . Dengan maraknya penipuan melalui SMS, kami harap anda melakukan pembayaran dengan teliti . Berikut nomor rekening bank Furniture Maju : <br>
                            * BANK BCA <br>
                            * No. Rek. 24567890(a.n Rizki) <br>
                            * Konfirmasi pembayaran <br>
                            setelah melakukan pembayaran , silahkan lakukan konfirmasi pembayaran melalui salah satu cara berikut : <br>
                            * Email ke furnituremaju@gmail.com <br>
                            * Telepon / WA ke no : 08123456920 <br>
                            Dengan format : KF < spasi > nama barang < spasi > jumlah < spasi > nama bank < spasi > nama rekening pengirim <br>
                            atau mengisi form konfirmasi berikut :
                          </p>
                    	<div class="parent">
												    <div class="box1">
															<?php
															include "koneksi.php";
															include 'kelas/pembeli.php';
															include 'kelas/barang.php';
													    $tampilpembeli = new Pembeli();
															$tampilbarangspesifik = new Barang();
															// Ambil data NIS yang dikirim oleh index.php melalui URL
															$id_pembeli = $_POST['id_pembeli'];

															// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
															foreach($tampilpembeli->tampilpembeli($id_pembeli) as $data){
															?>
														<form action="proses-pemesanan.php" method="POST" >
															<div class="form-group">
																<label>Nama Lengkap</label>
																<input type="hidden" class="form-control" name="id_pembeli" value="<?= $data['id_pembeli'] ?>" style="width: 250px" >
																<input type="text" class="form-control" name="nama_pembeli" placeholder="Nama Pembeli" value="<?= $data['nama_pembeli'] ?>" style="width: 250px" >
															</div>
															<div class="form-group">
																<label>No. Telepon</label>
																<input type="text" class="form-control" name="telepon" placeholder="Telepon" value="<?= $data['telepon'] ?>" style="width: 250px" >
															</div>
															<div class="form-group">
																<label>Alamat</label>
																<textarea name="alamat_pembeli" rows="3" cols="3" style="width: 250px"><?= $data['alamat_pembeli'] ?></textarea>
															</div>
                                <br>
                            </div>
														<?php
													}
														// Ambil data NIS yang dikirim oleh index.php melalui URL
														$kode_barang = $_POST['kode_barang'];

														// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
														foreach($tampilbarangspesifik->tampilbarangspesifik($kode_barang) as $data)
														?>
                            <div class="box2">
															<div class="form-group">
																<label>Jumlah Barang</label>
																<input type="hidden" class="form-control" name="kode_barang" placeholder="Kode Barang" value="<?= $data['kode_barang'] ?>" style="width: 250px" >
																<input type="text" class="form-control" name="jumlah_barang" placeholder="Jumlah Barang" style="width: 250px" >
															</div>
															<div class="form-group">
																<label>Nama Bank Asal</label>
																<input type="text" class="form-control" name="nama_bank" placeholder="Nama Barang" style="width: 250px" >
															</div>
															<div class="form-group">
																<label>Nama Pemilik Rekening</label>
																<input type="text" class="form-control" name="pemilik_rekening" placeholder="Harga Barang" style="width: 250px" >
															</div>
															<div class="form-group">
																<label>Jumlah Bayar</label>
																<input type="text" class="form-control" name="jumlah_bayar" placeholder="Jumlah Bayar" style="width: 250px" >
																<input type="hidden" class="form-control" name="status"  value="Belum" style="width: 250px" >
																<input type="hidden" class="form-control" name="tanggal" placeholder="Kode Barang" value="<?php $tgl=date('Y-m-d'); echo $tgl; ?>" style="width: 250px" >
															</div>
															<input type="submit" name="submit" value="Pesan" class="btn btn-success">
														</form>
															<a href="masuk.php"><input type="button" class="btn btn-default" value="Batal" style="color:black;" ></a>
                            </div>
     								</div>
                    </table>


		</div>
</div>
</div>
</div>
<br>
<br>
</body>
</html>
<?php
}else{
	header("location:login.php");
}
?>
