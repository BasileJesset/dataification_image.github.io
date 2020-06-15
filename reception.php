
<!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="UTF-8">
  <title>R-C-N-S</title>
  
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="https://use.typekit.net/mwz7uxl.css">
    
    
    
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
    
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="js/FileSaver.js"></script>
        <script type="text/javascript" src="js/Blob.js"></script>
        <script type="text/javascript" src="js/canvas-toBlob.js"></script>
    


</head>

<body>
    
<?php 
    if ($_POST ['data'] == "data"){

    

        if (isset($_POST ['texte_data'])){
            if (empty($_POST ['texte_data'])){
                $description = "Description absente";  
            } else{
                $description = $_POST ['texte_data'];
            }
        } 
    }
        ?>

    <style>
         #scream{
             display: none;
         }
    </style> 
    
    
    
<!--

Ajout : origine, date, mention
    
-->
<img id="scream" src="<?php echo $_POST['link'] ?>media?size=l"  crossOrigin = "Anonymous"alt="The Scream">
<canvas id="myCanvas" width="200" height="200"></canvas>
<canvas id="textCanvas" width="200" height="200"></canvas>
<div id="demo"></div>
    

<?php      
    $red[]= "";
    $str = $description;
    
    for ( $pos=0; $pos < strlen($str); $pos ++ ) {
        $byte = substr($str, $pos);
        $red[$pos]= ord($byte);
    }
?>
    
 <div id="affiche">
     <?php    
        for ( $pos=0; $pos < strlen($str); $pos ++ ) {
        echo $red[$pos];
    }
             ?>                             
    </div>   
    
    
 
    
    
<script>

setTimeout(function(){





            
            var c = document.getElementById("myCanvas");
            var img = document.getElementById("scream");

            c.width = img.width;
            c.height = img.height;
            var ctx = c.getContext("2d");    



            var textCanvas = document.getElementById("textCanvas");
            var ctx_text = textCanvas.getContext("2d");
            var value_text = [];
            textCanvas.width = img.width;
            textCanvas.height = img.height;
            var font_size = img.width/30;

            
            
            ctx_text.font = "400 " + font_size + "px neue-haas-grotesk-text";
      
            ctx_text.fillStyle = "rgb(200, 200, 200)";

            ctx_text.fillText("img_<?php echo date('H-i_d-m-Y'); ?>.png",20,textCanvas.height - 170 - font_size);
            ctx_text.fillText("<?php echo date('H:i d-m-Y') ?>",20,textCanvas.height - 30 - font_size);
            ctx_text.fillText("<?php echo "Origine : Instagram" ?>",20,textCanvas.height - 20);


            ctx_text.textAlign = "right";

            ctx_text.fillText("Zone des données inscrites",textCanvas.width-20,textCanvas.height/3-90);
            ctx_text.fillText("Raison : Premier test ",textCanvas.width-20,textCanvas.height - 170 - font_size);

            ctx_text.font = "200 " + font_size * 2.3 + "px neue-haas-grotesk-display";
            ctx_text.fillText("IMG.DATA",textCanvas.width-20,textCanvas.height - 20);


    //        Ajout ligne
            ctx_text.strokeStyle = 'rgb(200, 200, 200)';
            ctx_text.beginPath();
            ctx_text.moveTo(20, textCanvas.height - 150 - font_size);
            ctx_text.lineTo(textCanvas.width-20, textCanvas.height - 150 - font_size);
            ctx_text.stroke();


            ctx_text.beginPath();
            ctx_text.moveTo(20, textCanvas.height/3-70);
            ctx_text.lineTo(textCanvas.width-20, textCanvas.height/3-70);
            ctx_text.stroke();




            var imgData_text = ctx_text.getImageData(0, 0, c.width, c.height);

            
            
            
            var obtenir_opacite = (imgData_text.data.length/4)%4;

            for (i = 0; i < imgData_text.data.length; i += 4) {
                value_text.push(imgData_text.data[i]);
            }

            document.getElementById("demo").innerHTML = value_text[1];



            ctx.drawImage(img, 0, 0);
            var imgData = ctx.getImageData(0, 0, c.width, c.height);
            var rouge = [150 <?php  for ( $pos=0; $pos < strlen($str); $pos ++ ) { ?><?php echo ',"' ,$red[$pos], '"'; ?><?php } ?> ]
            var increment_rouge = 0;







            var obtenir_opacite = (imgData.data.length/4)%4;
            var compteur_text = 0;

            for (i = 0; i < imgData.data.length; i += 4){

                imgData.data[i] =  imgData.data[i];
                imgData.data[i+1] = imgData.data[i+1];
                imgData.data[i+2] =  imgData.data[i+2];
                imgData.data[i+3] = 255-value_text[compteur_text];

                compteur_text = compteur_text + 1;

    //            imgData.data[i+3] = Math.round((1020 + i%510)/6);
    //            imgData.data[i+3] = Math.round(Math.random()*155+100);
            }





            for (i = 0; i < imgData.data.length; i += 4) {
                imgData.data[i] =  imgData.data[i];
                imgData.data[i+1] = imgData.data[i+1];
                imgData.data[i+2] =  imgData.data[i+2];
                if(rouge[increment_rouge] === undefined){
                    imgData.data[i+3] = imgData.data[i+3];
                }else{
                    imgData.data[i+3] = rouge[increment_rouge];
                }
                increment_rouge= increment_rouge+1;
            }








            ctx.putImageData(imgData, 0, 0);



//        c.toBlob(function(blob) {
//            saveAs(blob, "img_<?php echo date('H-i_d-m-Y'); ?>.png");
//        });
    
        var dataURL = c.toDataURL();
      
    
            $.ajax({
          type: "POST",
          url: "script.php",
          data: { 
             imgBase64: dataURL
          }
        }).done(function(o) {
          console.log('saved'); 
          // If you want the file to be visible in the browser 
          // - please modify the callback in javascript. All you
          // need is to return the url to the file, you just saved 
          // and than put the image in your browser.
        });
      
    }, 3000);

    
//
//    $(document).ready(function(){
//        location.href = 'index.php';
//            }); 
   </script> 
    
    
    
    

</body>
</html>



