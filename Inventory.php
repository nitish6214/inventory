<?php
include 'connect.php';

class Inventory extends connect
{
    public $id, $qtyavail, $maxstock, $minstock;

    public function __construct()
    {
        parent::__construct();
    }

    public function Save()
    {
        if ($this->db_found == true) {
            $k = 0;
            $s = "SELECT * FROM inventory";
            $r = mysqli_query($this->db_found, $s);
            while ($f = mysqli_fetch_assoc($r)) {
                if ($f['id'] == $_POST['t1']) {
                    $k = 1;
                    break;
                }
            }
            if ($k == 1)
                echo "<div style='color: red; font-weight: bold;'>⚠️ ID already exists.</div>";
            else {
                $sql = "INSERT INTO inventory VALUES('$_POST[t1]', '$_POST[t2]', '$_POST[t3]', '$_POST[t4]')";
                mysqli_query($this->db_found, $sql);
                echo "<script>alert('Record saved successfully')</script>";
            }
        } else {
            echo "Database not found";
        }
    }

    public function Delete()
    {
        if ($this->db_found == true) {
            $sql = "DELETE FROM inventory WHERE id='$_POST[t1]'";
            mysqli_query($this->db_found, $sql);
            echo "<script>alert('Record deleted successfully')</script>";
        } else {
            echo "Database not found";
        }
    }

    public function Update()
    {
        if ($this->db_found == true) {
            $sql = "UPDATE inventory SET qtyavail='$_POST[t2]', minstock='$_POST[t3]', maxstock='$_POST[t4]' WHERE id='$_POST[t1]'";
            mysqli_query($this->db_found, $sql);
            echo "<script>alert('Record updated successfully')</script>";
        } else {
            echo "Database not found";
        }
    }

    public function AllSearch()
    {
        if ($this->db_found == true) {
            $s = "SELECT * FROM inventory";
            $r = mysqli_query($this->db_found, $s);
            echo "<table border=2 bgcolor=pink>
            <tr>
                <th>Id</th>
                <th>Qty Available</th>
                <th>Min Stock</th>
                <th>Max Stock</th>
            </tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr>
                    <td>" . $db_field['id'] . "</td>
                    <td>" . $db_field['qtyavail'] . "</td>
                    <td>" . $db_field['minstock'] . "</td>
                    <td>" . $db_field['maxstock'] . "</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "Data not found";
        }
    }

    public function PSearch()
    {
        if ($this->db_found == true) {
            $s = "SELECT * FROM inventory WHERE id='$_POST[t1]'";
            $r = mysqli_query($this->db_found, $s);
           echo "<table border=2 bgcolor=pink>
            <tr>
                <th>Id</th>
                <th>Qty Available</th>
                <th>Min Stock</th>
                <th>Max Stock</th>
            </tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr>
                    <td>" . $db_field['id'] . "</td>
                    <td>" . $db_field['qtyavail'] . "</td>
                    <td>" . $db_field['minstock'] . "</td>
                    <td>" . $db_field['maxstock'] . "</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "Data not found";
        }
    }

    public function Special_Search()
    {
        if ($this->db_found == true) {
            $value = $_POST["t1"];
            $field = $_POST["s"];
            $s = "SELECT * FROM inventory WHERE $field = '$value'";
            $r = mysqli_query($this->db_found, $s);
            echo "<table border=2 bgcolor=pink>
            <tr>
                <th>Id</th>
                <th>Qty Available</th>
                <th>Min Stock</th>
                <th>Max Stock</th>
            </tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr>
                    <td>" . $db_field['id'] . "</td>
                    <td>" . $db_field['qtyavail'] . "</td>
                    <td>" . $db_field['minstock'] . "</td>
                    <td>" . $db_field['maxstock'] . "</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "Data not found";
        }
    }

    public function Auto_search()
    {
        if ($this->db_found == true) {
            $s = "SELECT * FROM inventory WHERE id='$_POST[t1]'";
            $r = mysqli_query($this->db_found, $s);
            while ($db_field = mysqli_fetch_assoc($r)) {
                $this->id = $db_field['id'];
                $this->qtyavail = $db_field['qtyavail'];
                $this->minstock = $db_field['minstock'];
                $this->maxstock = $db_field['maxstock'];
            }
        }
    }
}

$ob = new Inventory();

if(isset($_REQUEST["b1"]))//To Save the record
{
     $ob->Save();
}
if(isset($_REQUEST["b3"]))//To delete the record
{
     $ob->Delete();
}
if(isset($_REQUEST["b2"]))//To update the record
{
     $ob->Update();
}
if(isset($_REQUEST["b4"]))//To show all record
{
     $ob->Allsearch();
}
if(isset($_REQUEST["b5"]))//Particular search
{
     $ob->Psearch();
}
if(isset($_REQUEST["b6"]))//special search
{
     $ob->Special_Search();
}
if(isset($_REQUEST["b7"]))//special search
{
     $ob->Auto_search();
}
?>
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
            width: 380px;
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
</head>
<body>

<form name="f" method="post" action="Inventory.php">
      <div class=container>
            <h2>Inventory</h2>
            <table border='1'>
        <tr>
            <th>Id</th>
            <td><input type="text" name="t1" value="<?= $ob->id ?>"></td>
        </tr>
        <tr>
            <th>Qty Available</th>
            <td><input type="text" name="t2" value="<?= $ob->qtyavail ?>"></td>
        </tr>
        <tr>
            <th>Min Stock</th>
            <td><input type="text" name="t3" value="<?= $ob->minstock ?>"></td>
        </tr>
        <tr>
            <th>Max Stock</th>
            <td><input type="text" name="t4" value="<?= $ob->maxstock ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type=reset value=New>
                <input type="submit" name="b1" value="Save">
                <input type="submit" name="b2" value="Update">
                <input type="submit" name="b3" value="Delete">
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="b4" value="AllSearch">
                <input type="submit" name="b5" value="Psearch">
                <input type="submit" name="b7" value="Auto_search">
            </td>
        </tr>
    </table>
</form>
</body>
</html>