<?php
include 'connect.php';

class login extends connect {
    public $id, $pwd;

    public function __construct() {
        parent::__construct();
    }

    public function login() {
        if ($this->db_found == true) {
            $s = "SELECT * FROM login";
            $r = mysqli_query($this->db_found, $s);
            $this->id = $_POST["t1"];
            $this->pwd = $_POST["t2"];
            $f = 0;
            $k = 0;

            while ($b = mysqli_fetch_assoc($r)) {
                if ($this->id == $b['id'] && $this->pwd == $b['pwd']) {
                    if ($b['counter'] > 0) {
                        $sql = "UPDATE login SET counter=counter-1 WHERE id ='$_POST[t1]' AND pwd='$_POST[t2]'";
                        mysqli_query($this->db_found, $sql);
                        echo "<div class='message success'>✅ Login successful. Welcome back!</div>";
                        $f = 1;
                        break;
                    } else {
                        $k = 1;
                        break;
                    }
                }
            }

            if ($k == 1) {
                echo "<div class='message warning'>⚠️ Login counter expired. Please register again.</div>";
            } else if ($f == 0) {
                echo "<div class='message error'>❌ Invalid ID or Password. Please try again.</div>";
            }
        } else {
            echo "<div class='message error'>❌ Database Not Found.</div>";
        }
    }
}

$ob = new login();
if (isset($_REQUEST["b1"])) {
    $ob->login();
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
    <form name='f' method='post' action='login.php'>
       <div class=container>
            <h2>LOGIN PAGE</h2>
            <table border='1'>
            <tr>
                <th>Login ID</th>
                <td><input type='text' name='t1'></td>
            </tr>
            <tr>
                <th>Login Password</th>
                <td><input type='text' name='t2'></td>
            </tr>
            <tr>
                <td colspan='2' style='text-align: center;'>
                    <input type='button' value='Register' onclick='a()'>
                    <input type='submit' value='Login' name='b1'>
                </td>
            </tr>
        </table>
    </form>
</div>

<script>
    function a() {
        window.open('register.php');
    }
</script>

</body>
</html>";
?>