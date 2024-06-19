<?php
    include_once("../koneksi.php");

    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $username = mysqli_real_escape_string($conn, $user);
        $password = mysqli_real_escape_string($conn, md5($pass));

        $query = "SELECT id, nama, username, level 
                  FROM user 
                  WHERE username = '$username' AND password = '$password'";
        
        $result = mysqli_query($conn, $query);
        $jumlah = mysqli_num_rows($result);

        if ($jumlah > 0) {
            session_start();
            
            $data = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $data['id'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['level'];

            header("Location: home.php");
        } else {
            header("Location: index.php?gagal=true");
        }
    }
?>