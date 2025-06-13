<?php
class connect
{
public function __construct()
{
$this->db_found=mysqli_connect("localhost","root","1234","inventory");
}
}
?>