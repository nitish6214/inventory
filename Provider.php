<?php
include 'connect.php';
class Provider extends connect
{
    public $id, $name, $address;

    public function __construct()
    {
        parent::__construct();
    }

    public function save()
    {
        if ($this->db_found == true) {
            $k = 0;
            $s = "SELECT * FROM provider";
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
                $sql = "INSERT INTO provider VALUES('$_POST[t1]', '$_POST[t2]', '$_POST[t3]')";
                mysqli_query($this->db_found, $sql);
                echo "<script>alert('Record saved')</script>";
            }
        } else {
            echo "Database Not Found";
        }
    }

    public function delete()
    {
        if ($this->db_found == true) {
            $sql = "DELETE FROM provider WHERE id='$_POST[t1]'";
            mysqli_query($this->db_found, $sql);
            echo "<script>alert('Record deleted')</script>";
        } else {
            echo "Database not found";
        }
    }

    public function update()
    {
        if ($this->db_found == true) {
            $sql = "UPDATE provider SET name='$_POST[t2]', address='$_POST[t3]' WHERE id='$_POST[t1]'";
            mysqli_query($this->db_found, $sql);
            echo "<script>alert('Record updated')</script>";
        } else {
            echo "Database not found";
        }
    }

    public function Allsearch()
    {
        if ($this->db_found == true) {
            $s = "SELECT * FROM provider";
            $r = mysqli_query($this->db_found, $s);
            echo "<center><table border=2 bgcolor=pink>
            <tr><th>Id</th><th>Name</th><th>Address</th></tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr><td>" . $db_field['id'] . "</td>";
                echo "<td>" . $db_field['nm'] . "</td>";
                echo "<td>" . $db_field['address'] . "</td></tr>";
            }
            echo "</table></center>";
        } else {
            echo "Data not found";
        }
    }

    public function Psearch()
    {
        if ($this->db_found == true) {
            $s = "SELECT * FROM provider WHERE id='$_POST[t1]'";
            $r = mysqli_query($this->db_found, $s);
            echo "<center><table border=2 bgcolor=pink>
            <tr><th>Id</th><th>Name</th><th>Address</th></tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr><td>" . $db_field['id'] . "</td>";
                echo "<td>" . $db_field['nm'] . "</td>";
                echo "<td>" . $db_field['address'] . "</td></tr>";
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
            $s = "SELECT * FROM provider WHERE $field = '$value'";
            $r = mysqli_query($this->db_found, $s);
            echo "<center><table border=2 bgcolor=pink>
            <tr><th>Id</th><th>Name</th><th>Address</th></tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr><td>" . $db_field['id'] . "</td>";
                echo "<td>" . $db_field['nm'] . "</td>";
                echo "<td>" . $db_field['address'] . "</td></tr>";
            }
            echo "</table></center>";
        } else {
            echo "Data not found";
        }
    }

    public function Auto_search()
    {
        if ($this->db_found == true) {
            $s = "SELECT * FROM provider WHERE id='$_POST[t1]'";
            $r = mysqli_query($this->db_found, $s);
            while ($db_field = mysqli_fetch_assoc($r)) {
                $this->id = $db_field['id'];
                $this->name = $db_field['nm'];
                $this->address = $db_field['address'];
            }
        }
    }
}

$ob = new Provider();
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
  if(isset($_REQUEST["b4"]))//show all reacord
  {
       $ob->Allsearch();
  }
  if(isset($_REQUEST["b5"]))//particular search
  {
       $ob->Psearch();
  }
  if(isset($_REQUEST["b6"]))//Special search
  {
       $ob->Special_search();
  }
  if(isset($_REQUEST["b7"]))//Special search
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
            height: 400px;
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

    <form method="post" action="Provider.php">
    <div class=container>
            <h2>PROVIDER</h2>
            <table border='1'>
        <tr>
            <th>Id</th>
            <th><input type="text" id="t1" name="t1" value="<?php echo $ob->id; ?>"></th>
     </tr>
     <tr>
        <th>Name</th>
        <th><input type="text" id="t2" name="t2" value="<?php echo $ob->name; ?>"></th>
    </tr>

    <tr>
        <th>Address</th>
        <th><input type="text" id="t3" name="t3" value="<?php echo $ob->address; ?>"></th>
    </tr>

    <tr>
          <td colspan=2>
              <input type='reset' name=b1 value=New>
              <input type='submit' name=b1 value=Save>
              <input type='submit' name=b2 value=Update>
              <input type='submit' name=b3 value=Delete>
          </td>
      </tr>
      <tr>
          <td colspan=2><input type='submit' name=b4 value=AllSearch>
              <input type='submit' name=b5 value=Psearch>
              <input type='submit' name=b7 value=Auto_search>
          </td>
      </tr>
    </form>
</div>
</body>
</html>