
    
    <?php 
      
    $text_recu = explode(" ", $_POST ['imagephp'] );
    
    for ( $i=0; $i < count($text_recu); $i ++ ) {
        $text_recu[$i] = chr($text_recu[$i]);
    }
    
    $text_final = implode ("", $text_recu);
    echo $text_final;
    
    ?>
 
  