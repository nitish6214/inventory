<?php
include 'connect.php';

class register extends connect {
    public function __construct() {
        parent::__construct();
    }

    public function save() {
        if ($this->db_found == true) {
            $k = 0;
            $s = "SELECT * FROM login";
            $r = mysqli_query($this->db_found, $s);
            while ($f = mysqli_fetch_assoc($r)) {
                if ($f['id'] == $_POST['t1']) {
                    $k = 1;
                    break;
                }
            }

            if ($k == 1) {
                echo "<div class='message error'>⚠️ ID already exists.</div>";
            } else {
                $sql = "INSERT INTO login VALUES('$_POST[t1]', '$_POST[t2]', '$_POST[t3]')";
                mysqli_query($this->db_found, $sql);
                echo "<div class='message success'>✅ Record saved successfully!</div>";
            }
        } else {
            echo "<div class='message error'>❌ Database Not Found.</div>";
        }
    }
}

$ob = new Register();
if (isset($_REQUEST["b1"])) {
    $ob->Save();
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
            width: 300px;
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
    <form name='f' method='post' action='Register.php'>
      <div class=container>
        <h2>REGISTER</h2>
          <table border='1'>
            <tr>
                <th>Login ID</th>
                <th><input type='text' name='t1'></th>
            </tr>
            <tr>
               <th>Password</th>
                <th><input type='text' name='t2'></td>
            </tr>
            <tr>
                <th>Counter</th>
                <th><input type='text' name='t3'></th>
            </tr>
            <tr>
                <td colspan='2'><center><input type='submit' name='b1' value='Save'></center></td>
            </tr>
        </table>
    </form>  
  </div>
 </body>
</html>";
?>