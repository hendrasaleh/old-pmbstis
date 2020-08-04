<?php

error_reporting(1);

require_once "database.php";

$url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$url .= "://".$_SERVER['HTTP_HOST'];
$url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

define('MAIN_URL', $url);

function insertImage($no_pendaftaran, $fileimage, $jenis_berkas)
{
    $connection = new database();
    $conn = $connection->getDb();

    $dir = "images/";
    $target_file = $dir."img_".date('dmYhis')."_".basename($fileimage['name']);
    $uploadOK = 1;

    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    if(isset($fileimage['tmp_name'])){
        $check = getimagesize($fileimage['tmp_name']);
        if($check !== false){
            echo "File is an image - " . $check["mime"] . ".";
            echo "<br>";
            $uploadOK = 1;
        }else{
            echo "File is not an image.";
            echo "<br>";
            $uploadOK = 0;
        }
    }


    // this line for check the image size
    if ($fileimage['size'] > 50000000) {
        echo "Sorry, your file is too large.";
        echo "<br>";
        $uploadOK = 0;
    }

    // this line for check the type of the image
    if($imageFileType != 'jpg' && $imageFileType != 'JPG' && $imageFileType != 'png' && $imageFileType != 'PNG' && $imageFileType != 'jpeg' && $imageFileType != 'gif'){
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        echo "<br>";
        $uploadOK = 0;
    }

    // this like for check of all process was ok or not
    if($uploadOK==0){
        echo "Your file was not uploaded.";
        echo "<br>";
    }else{

        if(move_uploaded_file($fileimage['tmp_name'], $target_file)){
            $imagePath = $target_file;

            try{
                $sql = "INSERT INTO data_berkas (no_pendaftaran, jenis_berkas, image_path) VALUES ('$no_pendaftaran', '$jenis_berkas', '$imagePath')";
                $myImage = $conn->prepare($sql);
                $myImage->execute();

                echo "Insert image successful";
                echo "<br>";

            }catch (PDOException $e){
                echo "ERROR : " . $e->getMessage();
            }
        }

    }
}

function displayImage($no_pendaftaran, $jenis_berkas, $size = 20){
    $connection = new database();
    $conn = $connection->getDb();

    try{
        $sqlQuery = "SELECT * FROM data_berkas WHERE no_pendaftaran = '$no_pendaftaran' AND jenis_berkas = '$jenis_berkas'";
        $getImage = $conn->prepare($sqlQuery);
        $getImage->execute();
            
        $result = $getImage->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $data){
            $jenis_berkas = $data['jenis_berkas'];
            $image_path = $data['image_path'];
            ?>
            <img src="<?php echo $image_path; ?>" width="<?php echo $size; ?>%">
            <br>
            <br>

            <?php
        }
    } catch (PDOException $e){
        echo "Error while displaying image : " . $e->getMessage();
    }
}

function tampilData($no_pendaftaran, $tabel) {
    $data = new database;

    $query = "SELECT * FROM $tabel WHERE no_pendaftaran = '$no_pendaftaran'";

    $getdata = $data->getDb()->query($query);

    foreach ($getdata as $key) {
        # code...
        $hasil = $key;
    }
    
    return $hasil;

}

function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

