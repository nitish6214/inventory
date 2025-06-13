<?php
   include 'connect.php';
   
   class Transfer extends connect
   {
     public $id, $qty, $Sdate1, $Rdate1;
     
     public function __construct()
     {
         parent::__construct();
     }
     
     public function save()
     {
        if($this->db_found == true)
        {
            $k = 0;
            $s = "select * from transfer";
            $r = mysqli_query($this->db_found, $s);
            while($f = mysqli_fetch_assoc($r))
            {
                if($f['id'] == $_POST['t1']) 
                {
                    $k = 1;
                    break;
                }
            }
            if($k == 1)
                echo "<div style='color: red; font-weight: bold;'>⚠️ ID already exists.</div>";
            else
            {
                $sql = "insert into transfer values('$_POST[t1]', '$_POST[t2]', '$_POST[t3]', '$_POST[t4]')";
                mysqli_query($this->db_found, $sql);
                echo "<script>alert('Record saved')</script>";
            }
        }
        else
            echo "Database Not Found";
     }
     
     public function delete()
     {
        if($this->db_found == true)
        {
            $sql = "delete from Transfer where id='$_POST[t1]'";
            mysqli_query($this->db_found, $sql);
            echo "<script>alert('Record deleted')</script>";
        }
        else
            echo "Database not found";
     }
     
     public function update()
     {
        if($this->db_found == true)
        {
            $sql = "Update Transfer set qty='$_POST[t2]', sdate1='$_POST[t3]', rdate1='$_POST[t4]' where id='$_POST[t1]'";
            mysqli_query($this->db_found, $sql);
            echo "<script>alert('Record updated')</script>";
        }
        else
            echo "Database not found";
     }
     
     public function allSearch()
     {
        if($this->db_found == true)
        {
            $s = "select * from transfer";
            $r = mysqli_query($this->db_found, $s);
            echo "<table class='center' border=2 bgcolor=pink>
                    <tr>
                        <th>Id</th>
                        <th>Qty</th>
                        <th>Sdate1</th>
                        <th>Rdate1</th>
                    </tr>";
            while($db_field = mysqli_fetch_assoc($r))
            {
                echo "<tr><th>".$db_field['id']."</th>";
                echo "<th>".$db_field['qty']."</th>";
                echo "<th>".$db_field['sdate']."</th>";
                echo "<th>".$db_field['rdate']."</th>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "Data not found";
        }
     }
     
     public function pSearch()
     {
        if($this->db_found == true)
        {
            $s = "select * from transfer where id='$_POST[t1]'";
            $r = mysqli_query($this->db_found, $s);
            echo "<table class='center' border=2 bgcolor=pink>
                    <tr>
                        <th>Id</th>
                        <th>Qty</th>
                        <th>Sdate1</th>
                        <th>Rdate1</th>
                    </tr>";
            while($db_field = mysqli_fetch_assoc($r))
            {
                echo "<tr><th>".$db_field['id']."</th>";
                echo "<th>".$db_field['qty']."</th>";
                echo "<th>".$db_field['sdate']."</th>";
                echo "<th>".$db_field['rdate']."</th>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "Data not found";
        }
     }
     
     public function specialSearch()
     {
        if($this->db_found == true) 
        {
            $value = $_POST["t1"];
            $field = $_POST["s"];
            $s = "SELECT * FROM Transfer WHERE $field = '$value'";
            $r = mysqli_query($this->db_found, $s);
            echo "<table class='center' border=2 bgcolor=pink>
                    <tr>
                        <th>Id</th>
                        <th>Qty</th>
                        <th>Sdate1</th>
                        <th>Rdate1</th>
                    </tr>";
            while($db_field = mysqli_fetch_assoc($r))
            {
                echo "<tr><th>".$db_field['id']."</th>";
                echo "<th>".$db_field['qty']."</th>";
                echo "<th>".$db_field['sdate']."</th>";
                echo "<th>".$db_field['rdate']."</th>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "Data not found";
        }
     }
     
     public function autoSearch()
     {
        if($this->db_found == true)
        {
            $s = "select * from transfer where id='$_POST[t1]'";
            $r = mysqli_query($this->db_found, $s);
            while($db_field = mysqli_fetch_assoc($r))
            {
                $this->id = $db_field['id'];
                $this->qty = $db_field['qty'];
                $this->Sdate1 = $db_field['sdate'];
                $this->Rdate1 = $db_field['rdate'];
            }
        }
     }
   }

   $ob = new Transfer();
   
   if(isset($_REQUEST["b1"])) // To Save the record
   {
        $ob->save();
   }
   
   if(isset($_REQUEST["b2"])) // To update the record
   {
        $ob->update();
   }
   
   if(isset($_REQUEST["b3"])) // To delete the record
   {
        $ob->delete();
   }
   
   if(isset($_REQUEST["b4"])) // Show all records
   {
        $ob->allSearch();
   }
   
   if(isset($_REQUEST["b5"])) // Particular Search
   {
        $ob->pSearch();
   }
   
   if(isset($_REQUEST["b6"])) // Special search
   {
        $ob->specialSearch();
   }
   
   if(isset($_REQUEST["b7"])) // Auto search
   {
        $ob->autoSearch();
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
            height: 450px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(60px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 40px;
            padding: 2px 20px;
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
            padding: 10px 20px;
            margin: 10px 0;
            box-sizing: border-box;
            border-radius: 30px;
            border: 2px solid red;
            background-color: transparent;
            color: black;
        }

        input[type=submit], input[type=button], input[type=reset]{
            background-color: rgb(7, 8, 7);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 30px;
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

<form name="f" method="post" action="Transfer.php">
    <center>
    <div class=container>
        <h2>TRANSFER</h2>
             <table border='1'>
            <tr>
                <th>Id</th>
                <th><input type="text" name="t1" value="<?= $ob->id ?>"></th>
            </tr>
            <tr>
                <th>Qty</th>
                <th><input type="text" name="t2" value="<?= $ob->qty ?>"></th>
            </tr>
            <tr>
                <th>Sdate1</th>
                <th><input type="text" name="t3" value="<?= $ob->Sdate1 ?>"></th>
            </tr>
            <tr>
                <th>Rdate1</th>
                <th><input type="text" name="t4" value="<?= $ob->Rdate1 ?>"></th>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="reset" name="b1" value="New">
                    <input type="submit" name="b1" value="Save">
                    <input type="submit" name="b2" value="Update">
                    <input type="submit" name="b3" value="Delete">
                </th>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" name="b4" value="All Search">
                    <input type="submit" name="b5" value="P Search">
                    <input type="submit" name="b7" value="Auto Search">
                </th>
            </tr>
        </table>
    </center>
</form>

</body>
</html>
