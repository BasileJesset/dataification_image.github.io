<!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="UTF-8">
  <title>DATAÏFICATEUR D'IMAGES</title>
  
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
    <script type="text/javascript" src="js/jquery-ui.js"></script>
        


</head>

<body>
    

 
<!--    <div id="grand_titre"> DATAÏFICATEUR D'IMAGES</div>-->
    
    <div id="ensemble_part">
        <div id="dataification_part" class="data_part">
            <div class="presentation"><h2>Dataïfier une image</h2><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam porttitor augue non arcu rhoncus commodo. Proin eu egestas orci. In vitae malesuada ex, at cursus massa. Nam malesuada cursus erat nec consectetur. In vulputate luctus venenatis. Vivamus quam mauris, mollis vitae tellus id, interdum molestie sem. Proin lobortis diam non ante tincidunt, quis eleifend nisi iaculis.</div>
            <form enctype="multipart/form-data" method="post"  action="reception.php" autocomplete="off"> 

                
                
<!--
                
                <label for="origin" class="titre">Origine de l'importation</label><br>
                <input name="origin" id="origin"/>
-->
                
                <div class="ensemble_select">
                    <div class="A_la_main apparait_select">
                        <div class="formulaire formulaire_img">

                            <label for="link" class="titre">Lien de l'image</label><br>
                            <input name="link" id="link"/>
                        </div>

                        <div class="formulaire">    
                            <label for="texte_data" class="titre">Données à ajouter </label><br>
                            <textarea name="texte_data" id="texte_data"></textarea><br>
                        </div>

                        <input name="data" style="display:none;" id="data" value="data"/>
                        
                        <input name="temporalite" style="display:none;" id="temporalite" value="<?php echo date('H-i_d-m-Y'); ?>" />

                        <div class="formulaire">  
                            <input type="submit" name="submit" value="Créer image data" id= "envoi" class="boutton"/>
                        </div>
                    </div>

                </div>
                
            </form>
        </div>   
        
        
        
        
        

        
        
        


        <div id="undataification_part" class="data_part">
            <div class="presentation"><h2>Undataïfier une image</h2><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam porttitor augue non arcu rhoncus commodo. Proin eu egestas orci. In vitae malesuada ex, at cursus massa. Nam malesuada cursus erat nec consectetur. In vulputate luctus venenatis. Vivamus quam mauris, mollis vitae tellus id, interdum molestie sem. Proin lobortis diam non ante tincidunt, quis eleifend nisi iaculis.<br><br>
            Le script le marche pas si le nom du png comprend un espace, ça sera bientôt réglé<br>
            Les options d'export ne sont pas configurées pour le moment</div>
            <form enctype="multipart/form-data" method="post"  action="un_dataification.php" autocomplete="off"> 
                
                
                <div class="formulaire formulaire_img">
                    <div id="conteneur_undata" class="index_conteneur_img">
                        <img id="imgpreview_undata" src="#" alt="your image">
                    </div>
                    <label for="img_undata" class="boutton" id="label_undata">Ajouter l'image à undata</label>
                    <input name="img_undata" type="file" style="display:none;" id="img_undata" class="image"/>

                </div>

                <input name="data" style="display:none;" id="data" value="un_data" class="image"/>
                <input name="temps" style="display:none;" id="temps" value="<?php echo time(); ?>" />
                
                <div class="formulaire">  
                    <input type="submit" name="submit" value="Séparer l'image de ces données" id= "envoi_undata" class="boutton"/>
                </div>

                
                
                
            </form>

        </div>
   </div> 
    
    
    
    <script>
        $(document).ready(function(){
            
            var data_or_undata = "";
            
            $("#label_data").mouseover(function(){
                data_or_undata = 0;
            });
            
            $("#label_undata").mouseover(function(){
                data_or_undata = 1;
            });

            
            

//            function readURL(input) {
//              if (input.files && input.files[0]) {
//                var reader = new FileReader();
//   
//                reader.onload = function(e) {
//                    if (data_or_undata == 0){
//                        $('#conteneur_data').fadeIn(500);
//                        $('#imgpreview_data').attr('src', e.target.result);
//                    }else{
//                        $('#conteneur_undata').fadeIn(500);
//                        $('#imgpreview_undata').attr('src', e.target.result);
//                    }
//                }
//
//                reader.readAsDataURL(input.files[0]); // convert to base64 string
//              }
//            }
//
//            $("#img_data").change(function() {
//              readURL(this);
//            });
//            $("#img_undata").change(function() {
//              readURL(this);
//            }); 
            
            
            
//            
            $("#img_data").change(function(){
                $("#label_data").fadeOut(1000);
                $("#envoi").fadeIn(1000);
            });
            
            $("#img_undata").change(function(){
                $("#label_undata").fadeOut(1000);
                $("#envoi_undata").fadeIn(1000);
            });        
//            
            
            var val_import = "";
            
//            $("#choix_import").change(function(){
//                val_import = $("#choix_import").val();
//                $(".apparait_select").fadeOut(500);
//                $("." + val_import).fadeIn(500);
//            });     
            
            
        });
    
    </script>

</body>
</html>
