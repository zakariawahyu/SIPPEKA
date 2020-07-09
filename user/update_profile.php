<?php
include "../database/koneksi.php";




function resizeImage($resourceType,$image_width,$image_height) {
    $resizeWidth = 250;
    $resizeHeight = 250;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
}

if(isset($_POST["submit"])) {
  $nip = $_POST['nip'];
  $select = mysqli_query($koneksi, "SELECT * FROM user where nip='$nip'");
  $hasilselect = mysqli_fetch_array($select);
	$imageProcess = 0;
    if(is_array($_FILES)) {
        $fileName = $_FILES['gambar']['tmp_name'];
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = time();
        $uploadPath = "../build/images/";
        $fileExt = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName);
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagejpeg($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                break;

            case IMAGETYPE_GIF:
                $resourceType = imagecreatefromgif($fileName);
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagegif($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                break;

            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName);
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagepng($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                break;

            default:
                $imageProcess = 0;
                break;
        }
        move_uploaded_file($file, $uploadPath. $resizeFileName. ".". $fileExt);
        $imageProcess = 1;
    }

	if($imageProcess == 1){
    if (!empty($hasilselect['foto'])) {
      unlink("../build/images/thump_".$hasilselect['foto']);
      $update = mysqli_query($koneksi, "UPDATE user SET foto='$resizeFileName.$fileExt' where nip='$nip'");
    }elseif (empty($foto)) {
      $update = mysqli_query($koneksi, "UPDATE user SET foto='$resizeFileName.$fileExt' where nip='$nip'" );
    }
    echo "<script>alert('Berhasil update profile'); document.location='index.php?page=profile';</script>";
	}else{
      echo "<script>alert('Gagal updtate, cek file photo kembali'); document.location='index.php?page=profile';</script>";
	}
	$imageProcess = 0;
}

?>
