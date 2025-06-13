<?php
  include 'connect.php';

  class Contact extends connect
  {
    public function __construct()
    {
        parent::__construct();
    }

    public function Send()
    {
        if($this->db_found == true)
        {
            $sql = "INSERT INTO Contact  VALUES ('$_POST[t1]', '$_POST[t2]', '$_POST[t3]', '$_POST[t4]')";            
            if(mysqli_query($this->db_found, $sql))
            echo "<script>alert('Record saved successfully');</script>";
        }
        else 
        {
            echo "Database Not Found";
        }
    }
  }

  $ob=new Contact();
  if(isset($_REQUEST["b1"]))//To Send the record
  {
       $ob->Send();
  }
  ?>
