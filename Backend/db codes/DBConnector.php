<?php

/* This class helps to establish a connection to the online_store_assessment database */

class DBConnector{
  public static function connectToDB(){
      return new mysqli("localhost","root","B.blessing2","basoma_autoworks");
  }
}

?>