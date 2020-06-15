
<?php 

	define('UPLOAD_DIR', 'assets/img/');
	$img = $_POST['imgBase64'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);


    $directory = "assets/img/";
    $filecount = 0;
    $files = glob($directory . "*");
    if ($files){
        $filecount = count($files);
    }

	$file = UPLOAD_DIR . $filecount . '.png';
	$success = file_put_contents($file, $data);
	print $success ? $file : 'Unable to save the file.';
?>




 ?>
            
            <?php for($i = 1; $i <= $filecount; $i++){ ?>
                <div class="img_zoo">
                    <img src="assets/img/<?php echo $i; ?>.png">
                </div>
            <?php } ?>