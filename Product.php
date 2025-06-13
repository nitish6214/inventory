<?php
include 'connect.php';

class Product extends connect
{
    public $id, $barcode, $name, $desc1, $category, $qty, $weight, $refrigerated;

    public function __construct()
    {
        parent::__construct();
    }

    public function save()
    {
        if ($this->db_found == true) {
            $k = 0;
            $s = "SELECT * FROM product";
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
                $sql = "INSERT INTO product VALUES ('{$_POST['t1']}', '{$_POST['t2']}', '{$_POST['t3']}', '{$_POST['t4']}', '{$_POST['t5']}', '{$_POST['t6']}', '{$_POST['t7']}', '{$_POST['t8']}')";
                mysqli_query($this->db_found, $sql);
                echo "<script>alert('Record saved');</script>";
            }
        } else {
            echo "Database Not Found";
        }
    }

    public function delete()
    {
        if ($this->db_found == true) {
            $sql = "DELETE FROM product WHERE id='{$_POST['t1']}'";
            mysqli_query($this->db_found, $sql);
            echo "<script>alert('Record deleted');</script>";
        } else {
            echo "Database Not Found";
        }
    }

    public function update()
    {
        if ($this->db_found == true) {
            $sql = "UPDATE product SET 
                barcode='{$_POST['t2']}', 
                name='{$_POST['t3']}', 
                desc1='{$_POST['t4']}', 
                category='{$_POST['t5']}', 
                qty='{$_POST['t6']}', 
                weight='{$_POST['t7']}', 
                refrigerated='{$_POST['t8']}'
                WHERE id='{$_POST['t1']}'";
            mysqli_query($this->db_found, $sql);
            echo "<script>alert('Record updated');</script>";
        } else {
            echo "Database Not Found";
        }
    }

    public function Allsearch()
    {
        if ($this->db_found == true) {
            $s = "SELECT * FROM product";
            $r = mysqli_query($this->db_found, $s);
            echo "<center><table border='2' bgcolor='pink'>
            <tr>
                <th>Id</th>
                <th>Barcode</th>
                <th>Name</th>
                <th>Desc1</th>
                <th>Category</th>
                <th>Qty</th>
                <th>Weight</th>
                <th>Refrigerated</th>
            </tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr>
                    <td>{$db_field['id']}</td>
                    <td>{$db_field['barcode']}</td>
                    <td>{$db_field['name']}</td>
                    <td>{$db_field['desc1']}</td>
                    <td>{$db_field['category']}</td>
                    <td>{$db_field['qty']}</td>
                    <td>{$db_field['weight']}</td>
                    <td>{$db_field['refrigerated']}</td>
                </tr>";
            }
            echo "</table></center>";
        } else {
            echo "Database Not Found";
        }
    }

    public function Psearch()
    {
        if ($this->db_found == true) {
            $s = "SELECT * FROM product WHERE id='{$_POST['t1']}'";
            $r = mysqli_query($this->db_found, $s);
            echo "<center><table border='2' bgcolor='pink'>
            <tr>
                <th>Id</th>
                <th>Barcode</th>
                <th>Name</th>
                <th>Desc1</th>
                <th>Category</th>
                <th>Qty</th>
                <th>Weight</th>
                <th>Refrigerated</th>
            </tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr>
                    <td>{$db_field['id']}</td>
                    <td>{$db_field['barcode']}</td>
                    <td>{$db_field['name']}</td>
                    <td>{$db_field['desc1']}</td>
                    <td>{$db_field['category']}</td>
                    <td>{$db_field['qty']}</td>
                    <td>{$db_field['weight']}</td>
                    <td>{$db_field['refrigerated']}</td>
                </tr>";
            }
            echo "</table></center>";
        } else {
            echo "Database Not Found";
        }
    }

    public function Special_search()
    {
        if ($this->db_found == true) {
            $value = $_POST["t1"];
            $field = $_POST["s"];
            $s = "SELECT * FROM product WHERE $field = '$value'";
            $r = mysqli_query($this->db_found, $s);
            echo "<center><table border='2' bgcolor='pink'>
            <tr>
                <th>Id</th>
                <th>Barcode</th>
                <th>Name</th>
                <th>Desc1</th>
                <th>Category</th>
                <th>Qty</th>
                <th>Weight</th>
                <th>Refrigerated</th>
            </tr>";
            while ($db_field = mysqli_fetch_assoc($r)) {
                echo "<tr>
                    <td>{$db_field['id']}</td>
                    <td>{$db_field['barcode']}</td>
                    <td>{$db_field['name']}</td>
                    <td>{$db_field['desc1']}</td>
                    <td>{$db_field['category']}</td>
                    <td>{$db_field['qty']}</td>
                    <td>{$db_field['weight']}</td>
                    <td>{$db_field['refrigerated']}</td>
                </tr>";
            }
            echo "</table></center>";
        } else {
            echo "Database Not Found";
        }
    }

    public function Auto_search()
    {
        if ($this->db_found == true) {
            $s = "SELECT * FROM product WHERE id='{$_POST['t1']}'";
            $r = mysqli_query($this->db_found, $s);
            if ($db_field = mysqli_fetch_assoc($r)) {
                $this->id = $db_field['id'];
                $this->barcode = $db_field['barcode'];
                $this->name = $db_field['name'];
                $this->desc1 = $db_field['desc1'];
                $this->category = $db_field['category'];
                $this->qty = $db_field['qty'];
                $this->weight = $db_field['weight'];
                $this->refrigerated = $db_field['refrigerated'];
            }
        }
    }
}

$ob = new Product();

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
            height: 630px;
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
  <form method="post" action="Product.php">
  <div class=container>
            <h2>PRODUCT</h2>
            <table border='1'>
        <tr>
           <th>Id</th>
           <th><input type="text" name="t1" id="t1" value="<?php echo $ob->id; ?>"></th>
      </tr>
     <tr>
       <th>Barcode</th>
       <th><input type="text" name="t2" id="t2" value="<?php echo $ob->barcode; ?>"></th>
    </tr>
     <tr>
        <th>Name</th>  
         <th><input type="text" name="t3" id="t3" value="<?php echo $ob->name; ?>"></th>
    </tr>
     <tr>
      <th>Description</th>
       <th><input type="text" name="t4" id="t4" value="<?php echo $ob->desc1; ?>"></th>
    </tr>
      <tr>
        <th>Category</th>
        <th><input type="text" name="t5" id="t5" value="<?php echo $ob->category; ?>"></th>
    </tr>
     <tr>
        <th>Quantity</th>
        <th><input type="text" name="t6" id="t6" value="<?php echo $ob->qty; ?>"></th>
    </tr>  
     <tr>
        <th>Weight</th>
        <th><input type="text" name="t7" id="t7" value="<?php echo $ob->weight; ?>"></th>
    </tr>
      <tr> 
         <th>Refrigerated</th>
        <th><input type="text" name="t8" id="t8" value="<?php echo $ob->refrigerated; ?>"></th>
    </tr>
    <tr>
          <td colspan=2><input type=reset value=New>
              <input type='submit' name=b1 value=Save>
              <input type='submit' name=b2 value=Update>
              <input type='submit' name=b3 value=Delete>
          </td>
      </tr>
      <tr>
          <td colspan=2>
              <input type='submit' name=b4 value=AllSearch>
              <input type='submit' name=b5 value=Psearch>
              <input type='submit' name=b7 value=Auto_search>
          </td>
      </tr>
  </form>
</div>
</body>
</html>