<?php
	// koneksi
	$conn = mysqli_connect("localhost", "root", "", "ptpn3");

	function query($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [] ;
		while ($row = mysqli_fetch_assoc($result)) {

			$rows [] =  $row;
		}
		return $rows;
	}

	function tambah($data){
		global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$tanggalmasuk = $data["tanggalmasuk"];
	$tujuan = htmlspecialchars($data["tujuan"]);
	$universitas = htmlspecialchars($data["universitas"]);
	$alamat = htmlspecialchars($data["alamat"]);
    $nomorhp = htmlspecialchars($data["nomorhp"]);
    
    
 
    //upload gambar
    $foto = upload();
    if (!$foto) {
    	return false;
    }

    $query = "INSERT INTO datamasuk
                VALUES
                ('','$nama', '$tanggalmasuk', '$tujuan', '$universitas', '$alamat', '$nomorhp', '$foto')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

	}

	function upload(){
		$namaFile = $_FILES['foto']['name'];
		$ukuranFile = $_FILES['foto']['size'];
		$error = $_FILES['foto']['error'];
		$tmpName = $_FILES['foto']['tmp_name'];

// cek apakah tidak ada gambar yang diupload
if ($error === 4) {
 	echo "
            <script>
            alert('Pilih Gambar Terlebih Dahulu!');
            </script>
        ";
    return false;
 	} 

 	// cek apakah yang di upload itu gambar atau tidak

	 	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	 	$ekstensiGambar = explode('.', $namaFile);
	 	$ekstensiGambar = strtolower(end($ekstensiGambar));
		 	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		 		echo "
		            <script>
		            alert('Yang anda Upload Bukan Gambar!');
		            </script>
		        ";
		    return false;
		 	}

		 // cek ukuran file
		 	if ($ukuranFile > 1000000) {
		 		echo "
		            <script>
		            alert('Ukuran Gambar Terlalu Besar!');
		            </script>
			        ";
			    return false;
			 	}

		// lolos cek, mari upload
			 	move_uploaded_file($tmpName, 'img/' . $namaFile);

			 	return $namaFile; 
		}

	function hapus($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM datamasuk WHERE id = $id");
		return mysqli_affected_rows($conn);
	}

function ubah($data){
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$tanggalmasuk = htmlspecialchars($data["tanggalmasuk"]);
	$tujuan = htmlspecialchars($data["tujuan"]);
	$universitas = htmlspecialchars($data["universitas"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$nomorhp = htmlspecialchars($data["nomorhp"]);
	$foto = htmlspecialchars($data["foto"]);

	

    $query = "UPDATE datamasuk SET
				nama = '$nama',
    			tanggalmasuk = '$tanggalmasuk',
				tujuan = '$tujuan',
    			universitas = '$universitas',
				alamat = '$alamat',
    			nomorhp = '$nomorhp',
    			foto = '$foto'
    			WHERE id = $id
    			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function cari($keyword){
	$query = "SELECT * FROM datamasuk
				WHERE
				nama LIKE '%$keyword%' OR
				universitas LIKE '%$keyword%' OR
				tujuan LIKE '%$keyword%' OR
				nomorhp LIKE '%$keyword%' OR
				alamat LIKE '%$keyword%' 
				";
	return query($query);
}

?>