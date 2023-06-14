<?php

$dingdanhao = date("ymdHi");
// $dingdanhao = str_replace("-","",$dingdanhao);
$TRY = rand(0,100);
$value = str_pad($TRY,2,'0',STR_PAD_LEFT);
// date("Y/m/d H:i:s")
$DECO = 'DF'.date("ymdHi").str_pad(rand(000,100),2,'0',STR_PAD_LEFT);
?>

<h2><?=print $dingdanhao;?></h2>
<h2><?=print $TRY;?></h2>
<h2><?=print $DECO;?></h2>