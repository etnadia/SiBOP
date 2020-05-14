<?php
  function buatrp($angka){
    $rupiah= number_format($angka,0,',','.');
    return $rupiah;
  }
?>