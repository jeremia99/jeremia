<?php
	//Admin Edit 
	if (isset($_GET['admin-edit'])) {
		$id 	=	$_GET['admin-edit'];

		if (isset($_POST['admin-update'])) {
			$username 	=	$_POST['username'];
			$name 		=	$_POST['name'];
			$telp 		=	$_POST['telp'];
			$status 	=	$_POST['status'];
			$alamat 	=	$_POST['alamat'];
			$kelamin 	=	$_POST['jenis_kelamin'];

			$admin 		=	mysqli_query($koneksi,"UPDATE users 
											SET `name` = '$name', `username` = '$username', `telp` = '$telp', 
												`alamat` = '$alamat', `status` = '$status', `jenis_kelamin` = '$kelamin'
											WHERE id = '$id'");
			if ($admin) {
				echo "<meta http-equiv='refresh' content='0;URL=?users=admin'>";
			}
		}

		$dataadmin 		= 	mysqli_query($koneksi,"SELECT * FROM users WHERE id=$id");
		$row 			= 	mysqli_fetch_assoc($dataadmin);
	}
?>
<?php 
	//Guru Edit
	if (isset($_GET['guru-edit'])) {
		$id 	=	$_GET['guru-edit'];

		if (isset($_POST['guru-update'])) {
			$nip 		=	$_POST['nip'];
			$username 	=	$_POST['username'];
			$name 		=	$_POST['name'];
			$telp 		=	$_POST['telp'];
			$status 	=	$_POST['status'];
			$alamat 	=	$_POST['alamat'];
			$kelamin 	=	$_POST['jenis_kelamin'];
			$kelas 		=	$_POST['kelas'];

			$guru 		=	mysqli_query($koneksi,"UPDATE users 
											SET `nomor_induk` = '$nip', `name` = '$name', `username` = '$username', `telp` = '$telp', 
												`alamat` = '$alamat', `status` = '$status', `jenis_kelamin` = '$kelamin', `kelas_id` = '$kelas'
											WHERE id = '$id'");
			if ($guru) {
				echo "<meta http-equiv='refresh' content='0;URL=?users=guru'>";
			}
		}

		$dataguru		= 	mysqli_query($koneksi,"SELECT *, kelas.kelas_nama FROM users INNER JOIN kelas ON users.kelas_id=kelas.kelas_id WHERE id=$id");
		$row 			= 	mysqli_fetch_assoc($dataguru);
	}
?>
<?php 
	//Siswa Edit
	if (isset($_GET['siswa-edit'])) {
		$id 	=	$_GET['siswa-edit'];

		if (isset($_POST['siswa-update'])) {
			$nis 		=	$_POST['nis'];
			$username 	=	$_POST['username'];
			$name 		=	$_POST['name'];
			$telp 		=	$_POST['telp'];
			$status 	=	$_POST['status'];
			$alamat 	=	$_POST['alamat'];
			$kelamin 	=	$_POST['jenis_kelamin'];
			$kelas 		=	$_POST['kelas'];

			$siswa 		=	mysqli_query($koneksi,"UPDATE users 
											SET `nomor_induk` = '$nis', `name` = '$name', `username` = '$username', `telp` = '$telp', 
												`alamat` = '$alamat', `status` = '$status', `jenis_kelamin` = '$kelamin', `kelas_id` = '$kelas'
											WHERE id = '$id'");
			if ($siswa) {
				echo "<meta http-equiv='refresh' content='0;URL=?users=siswa'>";
			}
		}

		$datasiswa		= 	mysqli_query($koneksi,"SELECT *, kelas.kelas_id, kelas.kelas_nama FROM users INNER JOIN kelas ON users.kelas_id=kelas.kelas_id WHERE id=$id");
		$row 			= 	mysqli_fetch_assoc($datasiswa);
	}
?>
<?php 
	//Kelas Edit
	if (isset($_GET['kelas-edit'])) {
		$id 	=	$_GET['kelas-edit'];

		if (isset($_POST['kelas-update'])) {
			$kelasnama 	=	$_POST['kelas'];

			$kelas 		=	mysqli_query($koneksi,"UPDATE kelas SET `kelas_nama` = '$kelasnama' WHERE kelas_id = '$id'");
			if ($kelas) {
				echo "<meta http-equiv='refresh' content='0;URL=?akademik=kelas'>";
			}
		}

		$datakelas		= 	mysqli_query($koneksi,"SELECT * FROM kelas WHERE kelas_id=$id");
		$row 			= 	mysqli_fetch_assoc($datakelas);
	}
?>
<?php 
	//Tahun Ajaran Edit
	if (isset($_GET['tahun-edit'])) {
		$id 	=	$_GET['tahun-edit'];

		if (isset($_POST['tahun-update'])) {
			$tahunnama 	=	$_POST['tahun'];

			$tahun 		=	mysqli_query($koneksi,"UPDATE tahun SET `tahun_nama` = '$tahunnama' WHERE tahun_id = '$id'");
			if ($tahun) {
				echo "<meta http-equiv='refresh' content='0;URL=?akademik=tahun'>";
			}
		}

		$datatahun		= 	mysqli_query($koneksi,"SELECT * FROM tahun WHERE tahun_id=$id");
		$row 			= 	mysqli_fetch_assoc($datatahun);
	}
?>
<?php 
	//Mata Pelajaran Edit
	if (isset($_GET['pelajaran-edit'])) {
		$id 	=	$_GET['pelajaran-edit'];

		if (isset($_POST['pelajaran-update'])) {
			$pelajarannama 	=	$_POST['pelajaran'];

			$pelajaran 		=	mysqli_query($koneksi,"UPDATE pelajaran SET `pelajaran_nama` = '$pelajarannama' WHERE pelajaran_id = '$id'");
			if ($pelajaran) {
				echo "<meta http-equiv='refresh' content='0;URL=?akademik=pelajaran'>";
			}
		}

		$datapelajaran	= 	mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE pelajaran_id=$id");
		$row 			= 	mysqli_fetch_assoc($datapelajaran);
	}
?>
<?php 
	//Kategori Edit
	if (isset($_GET['kategori-edit'])) {
		$id 	=	$_GET['kategori-edit'];

		if (isset($_POST['kategori-update'])) {
			$kategorinama 	=	$_POST['nama'];
			$kategorideskripsi 	=	$_POST['deskripsi'];

			$kategori 		=	mysqli_query($koneksi,"UPDATE kategori SET `kategori_nama` = '$kategorinama', `kategori_deskripsi` = '$kategorideskripsi' WHERE kategori_id = '$id'");
			if ($kategori) {
				echo "<meta http-equiv='refresh' content='0;URL=?artikel=kategori'>";
			}
		}

		$datakategori	= 	mysqli_query($koneksi,"SELECT * FROM kategori WHERE kategori_id=$id");
		$row 			= 	mysqli_fetch_assoc($datakategori);
	}
?>
<?php 
	//Data Sekolah Create
	if (isset($_GET['sekolah-edit'])) {
		$id 	=	$_GET['sekolah-edit'];

		if (isset($_POST['sekolah-update'])) {
			$nama		=	$_POST['nama'];
			$alamat		=	$_POST['alamat'];
			$telp		=	$_POST['telp'];
			$visi		=	$_POST['visi'];
			$misi		=	$_POST['misi'];

			$sekolah 	= 	mysqli_query($koneksi,"UPDATE sekolah 
										SET `sekolah_nama` = '$nama', `sekolah_alamat` = '$alamat', `sekolah_telp` = '$telp', `sekolah_visi` = '$visi', `sekolah_misi` = '$misi' 
										WHERE sekolah_id = '$id'");

			if ($sekolah) {
				echo "<meta http-equiv='refresh' content='0;URL=?akademik=sekolah'>";
			}
		}

		$datasekolah 	=	mysqli_query($koneksi,"SELECT * FROM sekolah WHERE sekolah_id=$id");
		$row 			=	mysqli_fetch_assoc($datasekolah);
	}
?>
<?php 
	//Nilai Edit
	if (isset($_GET['nilai-edit'])) {
		$id 	=	$_GET['nilai-edit'];

		if (isset($_POST['nilai-update'])) {
			$kkm 		=	$_POST['kkm'];
			$nilaipoin 	=	$_POST['poin'];

			$nilai 		=	mysqli_query($koneksi,"UPDATE nilai SET `nilai_kkm` = '$kkm', `nilai_poin` = '$nilaipoin' WHERE nilai_id = '$id'");
			if ($nilai) {
				echo "<meta http-equiv='refresh' content='0;URL=?nilai=tampil'>";
			}
		}

		$datanilai	= 	mysqli_query($koneksi,"SELECT * FROM nilai WHERE nilai_id=$id");
		$row 			= 	mysqli_fetch_assoc($datanilai);
	}
?>
<?php 
	//Data Sekolah Create
	if (isset($_GET['artikel-edit'])) {
		$id 	=	$_GET['artikel-edit'];

		if (isset($_POST['update-artikel'])) {
			$judul		=	$_POST['judul'];
			$isi		=	$_POST['isi'];
			$kategori		=	$_POST['kategori'];

			$artikel 	= 	mysqli_query($koneksi,"UPDATE artikel
										SET `artikel_judul` = '$judul', `artikel_isi` = '$isi', `artikel_tgl` = now(), `kategori_id` = '$kategori' 
										WHERE artikel_id = '$id'");

			if ($artikel) {
				echo "<meta http-equiv='refresh' content='0;URL=?artikel=list'>";
			}
		}

		$dataartikel 	=	mysqli_query($koneksi,"SELECT * FROM artikel WHERE artikel_id=$id");
		$row 			=	mysqli_fetch_assoc($dataartikel);
	}
?>
<?php 
	// Profile
	if (isset($_GET['profile'])) {
		$id 	=	$_GET['profile'];

		$dataprofile 	=	mysqli_query($koneksi,"SELECT * FROM users WHERE id=$id");
		$row 			=	mysqli_fetch_assoc($dataprofile);
	}
?>
<?php 
	// Profile
	if (isset($_GET['change'])) {
		$id 	=	$_GET['change'];

		if (isset($_POST['change'])) {
			$new		=	$_POST['new'];

			$password 	= 	mysqli_query($koneksi,"UPDATE users 
										SET `password` = '$new'
										WHERE id = '$id'");

			if ($password) {
				echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			}
		}

		$datapassword 	=	mysqli_query($koneksi,"SELECT * FROM users WHERE id=$id");
		$row 			=	mysqli_fetch_assoc($datapassword);
	}
?>