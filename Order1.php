<?php 
include 'connect.php';
class Order1 extends connect {
    public $id, $date1;

    public function __construct() {
        parent::__construct();
    }

    public function save() {
        if ($this->db_found == true) {
            $k = 0;
            $s = "select * from order1";
            $r = mysqli_query($this->db_found, $s);
            while ($f = mysqli_fetch_assoc($r)) {
                if ($f['id'] == $_POST['t1']) {
                    $k = 1;
                    break;
                }
            }
            if ($k == 1)
                echo "<div class='error'>⚠️ ID already exists.</div>";
            else {
                $sql = "insert into order1 values('$_POST[t1]','$_POST[t2]')";
                mysqli_query($this->db_found, $sql);
                echo "<script>alert('Record saved')</script>";
            }
        } else {
            echo "Database Not Found";
        }
    }

    public function delete() {
        if ($this->db_found == true) {
            $sql = "delete from Order1 where id='$_POST[t1]'";
            mysqli_query($this->db_found, $sql);
            echo "<script>alert('Record deleted')</script>";
        } else {
            echo "Database not found";
        }
    }

    public function Update() {
        if ($this->db_found == true) {
            $sql = "Update Order1 set date1='$_POST[t2]' where id='$_POST[t1]'";
            mysqli_query($this->db_found, $sql);
            echo "<script>alert('Record updated')</script>";
        } else {
            echo "Database not found";
        }
    }

    public function Allsearch() {
        if ($this->db_found == true) {
            $s = "select * from order1";
            $r = mysqli_query($this->db_found, $s);
           echo "<table border=2 bgcolor=pink>
            <tr><th>Order ID</th><th>Order Date</th></tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr><td>{$db_field['id']}</td><td>{$db_field['date1']}</td></tr>";
            }
            echo "</table></div>";
        } else {
            echo "Data not found";
        }
    }

    public function Psearch() {
        if ($this->db_found == true) {
            $s = "select * from order1 where id='$_POST[t1]'";
            $r = mysqli_query($this->db_found, $s);
           echo "<table border=2 bgcolor=pink>
            <tr><th>Order ID</th><th>Order Date</th></tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr><td>{$db_field['id']}</td><td>{$db_field['date1']}</td></tr>";
            }
            echo "</table></div>";
        } else {
            echo "Data not found";
        }
    }

    public function Special_search() {
        if ($this->db_found == true) {
            $value = $_POST["t1"];
            $field = $_POST["s"];
            $s = "SELECT * FROM order1 WHERE $field = '$value'";
            $r = mysqli_query($this->db_found, $s);
           echo "<table border=2 bgcolor=pink>
            <tr><th>ID</th><th>Date</th></tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr><td>{$db_field['id']}</td><td>{$db_field['date1']}</td></tr>";
            }
            echo "</table></div>";
        } else {
            echo "Database not found.";
        }
    }

    public function Auto_search() {
        if ($this->db_found == true) {
            $s = "select * from order1 where id='$_POST[t1]'";
            $r = mysqli_query($this->db_found, $s);
            while ($db_field = mysqli_fetch_assoc($r)) {
                $this->id = $db_field['id'];
                $this->date1 = $db_field['date1'];
            }
        }
    }
}

$ob = new Order1();

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
       $ob->Special_search();
  }
  if(isset($_REQUEST["b7"]))//Auto search
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
            height: 320px;
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
            padding: 10px 0px;
            margin: 2px 0;
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
            border-radius: 20px;
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
<form name="f" method="post" action="Order1.php">
<center>
    <div class=container>
            <h2>ORDER1</h2>
            <table border='1'>
      <tr>
         <th>ID</th>
         <th><input type="text" name="t1" value="<?php echo $ob->id; ?>"></th>
    </tr>
    <tr>
          <th>Date</th>
           <th><input type="text" name="t2" value="<?php echo $ob->date1; ?>"></th>
    </tr>

    <tr>
          <td colspan=2><input type=reset value=New>
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
      </div>
</form>