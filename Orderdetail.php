<?php
include 'connect.php';
class Orderdetail extends connect
{
    public $id, $qty, $adate1, $rdate1;

    public function __construct()
    {
        parent::__construct();
    }

    public function save()
    {
        if ($this->db_found == true) {
            $p = 0;
            $s = "select * from order1";
            $r = mysqli_query($this->db_found, $s);
            $this->id = $_POST["t1"];
            while ($b = mysqli_fetch_assoc($r)) {
                if ($this->id == $b['id']) {
                    $p = 1;
                    break;
                }
            }
            if ($p == 1) {
                $sql = "insert into orderdetail values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]')";
                mysqli_query($this->db_found, $sql);
                echo "<script>alert('Record saved')</script>";
            } else {
                echo "<div style='color: red; font-weight: bold;'>⚠️ orderdetail id must exist in the order1 table</div>";
            }
        } else {
            echo "Database not found";
        }
    }

    public function delete()
    {
        if ($this->db_found == true) {
            $sql = "delete from Orderdetail where id='$_POST[t1]'";
            mysqli_query($this->db_found, $sql);
            echo "<script>alert('Record deleted')</script>";
        } else {
            echo "Database not found";
        }
    }

    public function Update()
    {
        if ($this->db_found == true) {
            $sql = "Update Orderdetail set qty='$_POST[t2]',adate1='$_POST[t3]',rdate1='$_POST[t4]' where id='$_POST[t1]'";
            mysqli_query($this->db_found, $sql);
            echo "<script>alert('Record updated')</script>";
        } else {
            echo "Database not found";
        }
    }

    public function Allsearch()
    {
        if ($this->db_found == true) {
            $s = "select * from orderdetail";
            $r = mysqli_query($this->db_found, $s);
           echo "<table border=2 bgcolor=pink>
            <tr>
            <th>Id</th>
            <th>Qty</th>
            <th>Adate1</th>
            <th>Rdate1</th>
            </tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr><td>" . $db_field['id'] . "</td>";
                echo "<td>" . $db_field['qty'] . "</td>";
                echo "<td>" . $db_field['adate'] . "</td>";
                echo "<td>" . $db_field['rdate'] . "</td></tr>";
            }
            echo "</table></center>";
        } else {
            echo "Data not found";
        }
    }

    public function Psearch()
    {
        if ($this->db_found == true) {
            $s = "select * from orderdetail where id='$_POST[t1]'";
            $r = mysqli_query($this->db_found, $s);
           echo "<table border=2 bgcolor=pink>
            <tr>
            <th>Id</th>
            <th>Qty</th>
            <th>Adate1</th>
            <th>Rdate1</th>
            </tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr><td>" . $db_field['id'] . "</td>";
                echo "<td>" . $db_field['qty'] . "</td>";
                echo "<td>" . $db_field['adate'] . "</td>";
                echo "<td>" . $db_field['rdate'] . "</td></tr>";
            }
            echo "</table></center>";
        } else {
            echo "Data not found";
        }
    }

    public function Special_search()
    {
        if ($this->db_found == true) {
            $value = $_POST["t1"];
            $field = $_POST["s"];
            $s = "SELECT * FROM orderdetail WHERE $field = '$value'";
            $r = mysqli_query($this->db_found, $s);
            echo "<center><table>
            <tr>
            <th>Id</th>
            <th>Qty</th>
            <th>Adate1</th>
            <th>Rdate1</th>
            </tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr><td>" . $db_field['id'] . "</td>";
                echo "<td>" . $db_field['qty'] . "</td>";
                echo "<td>" . $db_field['adate'] . "</td>";
                echo "<td>" . $db_field['rdate'] . "</td></tr>";
            }
            echo "</table></center>";
        } else {
            echo "Data not found";
        }
    }
}

$ob = new Orderdetail();
if (isset($_REQUEST["b1"])) 
{
    $ob->Save();
}
if (isset($_REQUEST["b2"])) 
{
    $ob->Update();
}
if (isset($_REQUEST["b3"])) 
{
    $ob->Delete();
}
if (isset($_REQUEST["b4"])) 
{
    $ob->Allsearch();
}
if (isset($_REQUEST["b5"])) 
{
    $ob->Psearch();
}
if (isset($_REQUEST["b6"])) 
{
    $ob->Special_search();
}

echo "
<style>
        /* Global Body Styles */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #80a2e0; 
            background-size: 400% 400%;
            font-family: Arial, sans-serif;
            color: black;
        }

        /* Form Container */
        .container {
            width: 350px;
            height: 500px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(60px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
        }

        /* Marquee Animation */
        marquee {
            font-size: 20px;
            color: white;
            padding-bottom: 10px;
        }

        /* Table Styling */
        table {
            margin-top: 10px;
        }

        td {
            padding: 10px;
        }

        /* Input Styles */
        input[type=text] {
            width: 100%;
            padding: 10px 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border-radius: 20px;
            border: 2px solid red;
            background-color: transparent;
            color: black;
        }

        input[type=submit], input[type=button], input[type=reset]{
            background-color: rgb(7, 8, 7);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            transition: 0.3s;
            border-bottom: 2px solid red;
        }

        /* Button Hover Effect */
        input[type=submit]:hover, input[type=button]:hover {
            background-color: #ff6b6b;
            transform: scale(1.05);
        }

        /* Heading Styles (for H2 if needed) */
        h2 {
            color:rgb(12, 12, 12);
            font-size: 30px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        /* Centered Heading if you want to use <h2> */
        .heading-container {
            text-align: center;
            margin-bottom: 20px;
        }
</style>

<form name=f method=post action=Orderdetail.php>
<center> 
    <div class=container>
            <h2>ORDERDETAIL</h2>
            <table border='1'>
<tr>
    <th>Id</th>
    <td><input type=text name=t1 value='$ob->id'></td>
</tr>
<tr>
    <th>Qty</th>
    <td><input type=text name=t2 value='$ob->qty'></td>
</tr>
<tr>
    <th>Adate1</th>
    <td><input type=text name=t3 value='$ob->adate1'></td>
</tr>
<tr>
    <th>Rdate1</th>
    <td><input type=text name=t4 value='$ob->rdate1'></td>
</tr>
<tr>
    <td colspan=2><input type=reset value=New>
        <input type='submit' name=b1 value='Save'>
        <input type='submit' name=b2 value='Update'>
        
    </td>
</tr>
<tr>
    <td colspan=2><input type='submit' name=b3 value='Delete'>
                   <input type='submit' name=b4 value='AllSearch'>
                   <input type='submit' name=b5 value='Psearch'>
    </td>
</tr>
</table>
</center>
</form>";
?>