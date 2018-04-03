<?php
  //commentがGETされているなら
  if(isset($_GET["comment"])){
    //エスケープしてから表示
    $comment = htmlspecialchars($_GET["comment"]);
    $num = $_GET["num"];
    $comment = Conv($comment,$num);
    echo "<h4>復号化した文字列</h4><h2>$comment</h2>";
  }else{
    echo 'FAIL TO AJAX REQUEST';
  }
?>
<?php
  function Conv($before,$num){
          foreach(str_split($before) as $be_chr){
            $af_chr = Change($be_chr,$num);
            $after .= $af_chr;
          }
          return $after;
  }

  function Change($be_chr,$num){
    $smCh_array = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
    $bgCh_array = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
    $numCh_array = array("0","1", "2", "3", "4", "5", "6", "7", "8", "9");

    if (in_array($be_chr, $smCh_array)) {
      for($i = 0; $i < 26; $i++){
        if ($smCh_array[$i] == $be_chr)
          break;
      }
      $i = $i - $num;
      if( $i < 0 ){
        $i = 26 - abs($i);
      }
      $af_chr = $smCh_array[$i];
    }

    else if (in_array($be_chr, $bgCh_array)) {
      for($i = 0; $i < 26; $i++){
        if ($bgCh_array[$i] == $be_chr)
          break;
      }
      $i = $i - $num;
      if( $i < 0 ){
        $i = 26 - abs($i);
      }
      $af_chr = $bgCh_array[$i];
    }

    else if (in_array($be_chr, $numCh_array)) {
      for($i = 0; $i < 10; $i++){
        if ($numCh_array[$i] == $be_chr)
          break;
      }
      $i = $i - $num;
      if( $i < 0 ){
        $i = 10 - abs($i);
      }
      $af_chr = $numCh_array[$i];
    }
    else{
      $af_chr = $bf_chr;
    }

    return $af_chr;
  }
?>
