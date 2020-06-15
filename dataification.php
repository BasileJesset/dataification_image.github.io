<!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="UTF-8">
  <title>R-C-N-S</title>
  
<link rel="stylesheet" href="css/index.css">
    
<?php     
 header("Access-Control-Allow-Origin: *");   
?>
    
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
<!--            <script type="text/javascript" src="https://cdn.rawgit.com/eligrey/Blob.js/0cef2746414269b16834878a8abc52eb9d53e6bd/Blob.js"></script>-->
    


</head>

<body>
    
    
 <style>
     #scream{
         display: none;
     }
</style>   
    
<a id="download" download="image.png"><button type="button" onClick="download()">Download</button></a>
<img id="scream" src="green.jpg" alt="The Scream">
<canvas id="myCanvas" width="200" height="200"></canvas>

    

<?php      
    $red[]= "";
    $str = "« Regardez, regardez, continua le comte en saisissant chacun des deux jeunes gens par la main, regardez, car, sur mon âme, c’est curieux, voilà un homme qui était résigné à son sort, qui marchait à l’échafaud, qui allait mourir comme un lâche, c’est vrai, mais enfin il allait mourir sans résistance et sans récrimination : savez-vous ce qui lui donnait quelque force ? savez-vous ce qui le consolait ? savez-vous ce qui lui faisait prendre son supplice en patience ? c’est qu’un autre partageait son angoisse ; c’est qu’un autre allait mourir comme lui ; c’est qu’un autre allait mourir avant lui ! Menez deux moutons à la boucherie, deux bœufs à l’abattoir, et faites comprendre à l’un d’eux que son compagnon ne mourra pas, le mouton bêlera de joie, le bœuf mugira de plaisir mais l’homme, l’homme que Dieu a fait à son image, l’homme à qui Dieu a imposé pour première, pour unique, pour suprême loi, l’amour de son prochain, l’homme à qui Dieu a donné une voix pour exprimer sa pensée, quel sera son premier cri quand il apprendra que son camarade est sauvé ? un blasphème. Honneur à l’homme, ce chef-d’œuvre de la nature, ce roi de la création ! »

Et le comte éclata de rire, mais d’un rire terrible qui indiquait qu’il avait dû horriblement souffrir pour en arriver à rire ainsi.";
    
    
    
    
    for ( $pos=0; $pos < strlen($str); $pos ++ ) {
        $byte = substr($str, $pos);
        $red[$pos]= ord($byte);
    }

?>
    
    
    
    
 
    
    
<script>

    document.getElementById("scream").onload = function() {
 
        var c = document.getElementById("myCanvas");
        var img = document.getElementById("scream");
        img.crossOrigin = "Anonymous";
//        img.setAttribute('crossOrigin', 'Anonymous');
        c.width = img.width;
        c.height = img.height+20;
        var ctx = c.getContext("2d");

        ctx.drawImage(img, 0, 0);
        var imgData = ctx.getImageData(0, 0, c.width, c.height);
        
        var rouge = [150 <?php  for ( $pos=0; $pos < strlen($str); $pos ++ ) { ?><?php echo ',"' ,$red[$pos], '"'; ?><?php } ?> ]
        var increment_rouge = 0;

        for (i = imgData.data.length - 20*4*c.width; i < imgData.data.length - 20*4*c.width + rouge.length; i += 4) {
            imgData.data[i] =  rouge[increment_rouge];
            imgData.data[i+1] = 0;
            imgData.data[i+2] =  0;
            imgData.data[i+3] = 255;
            increment_rouge= increment_rouge+1;
        }
        
        ctx.putImageData(imgData, 0, 0);
        

    c.toBlob(function(blob) {
        saveAs(blob, "image_data.png");
});
    };
    
</script>
    
    
    
    
    

</body>
</html>
