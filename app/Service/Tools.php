<?php

namespace Service;

class Tools
{
  public function debag($a){
    echo '<pre>';
    print_r($a);
    echo '</pre>';
  }
}
