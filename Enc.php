<?php
  //commentがGETされているなら
  if(isset($_GET["comment"])){
    //エスケープしてから表示
    $comment = htmlspecialchars($_GET["comment"]);
    $num = $_GET["num"];
    $comment = Conv($comment,$num);
    echo "<h4>暗号化した文字列</h4><h2>$comment</h2>";
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
    for($i = 1; $i <= $num; $i++)
      if($be_chr == "z"){
        $be_chr = "a";
      }else if($be_chr == "Z"){
        $be_chr = "A";
      }else if($be_chr == "9"){
        $be_chr = "0";
      }else{
        $be_chr++;
      }
    $af_chr = $be_chr;
    return $af_chr;
  }
?>
