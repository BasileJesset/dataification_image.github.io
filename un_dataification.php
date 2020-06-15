<!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="UTF-8">
  <title>R-C-N-S</title>
  
<link rel="stylesheet" href="css/index.css">

    
        <!-- FAVICON   -->
<link rel="apple-touch-icon" sizes="57x57" href="fav/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="fav/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="fav/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="fav/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="fav/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="fav/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="fav/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="fav/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="fav/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="fav/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="fav/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
<link rel="manifest" href="fav/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="fav/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">  
    
        <script type="text/javascript" src="js/FileSaver.js"></script>
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        
    


</head>

<body>
    
    
 <style>
     #scream{
         display: none;
     }
</style>   
    
    
    
<?php 
        $temps =  $_POST ['temps'];
        $image = $_FILES ['img_undata']['tmp_name'];
        $uploads_dir = 'uploads';
        $tmp_name = $_FILES['img_undata']['tmp_name'];
        $name = basename($_FILES['img_undata']['name']);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        rename("$uploads_dir/$name", "uploads/data" + $temps + ".png");
    

    
?>
    
<div id="texte_img"></div>  
<div class="bip"><?php echo $temps; ?></div>    
    
<img id="scream" src="uploads/logo.png" alt="The Scream">
<canvas id="myCanvas" width="200" height="200"></canvas>
    


    
    

    
 
    
    
<script>

    document.getElementById("scream").onload = function() {
 
        var c = document.getElementById("myCanvas");
        var img = document.getElementById("scream");
        img.crossOrigin = "Anonymous";
        c.width = img.width;
        c.height = img.height;
        var ctx = c.getContext("2d");


        ctx.drawImage(img, 0, 0);
        var imgData = ctx.getImageData(0, 0, c.width, c.height);
        
        var increment_rouge = 0;
        var rouge = "";
        var ensemble_rouge = "";
        
        var stop = "";
        var i = 0;

        
        while (imgData.data[i+3] != 255) {

            rouge += imgData.data[i+3] + " ";
            i += 4;
          
        }
        
//        for (i = 0 ; i < imgData.data.length; i += 4) {

//               rouge += imgData.data[i+3] + " ";

////            imgData.data[i+1] = 0;
////            imgData.data[i+2] =  0;
////            imgData.data[i+3] = 255;
//            increment_rouge= increment_rouge+1;
//        }
        
        ctx.putImageData(imgData, 0, 0);
        
//        for (i=0; i<increment_rouge; i++){
//            ensemble_rouge += rouge[i] + " ";
//        }

                
        var imagephp = rouge;
        $.ajax({
            url : "un_dataification_echo.php",
            method:'POST',
            data : {imagephp:imagephp},
            dataType : "HTML",
                    
            success : function(data){
        
                $("#texte_img").html(data);
                      
            }
                    
        });
        
        

    };
    
</script>
    
    
    
    
    

</body>
</html>
