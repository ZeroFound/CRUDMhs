<?php
include 'config.php';

if(isset($_POST['login'])){

}
$username=$_POST['user'];
$password=($_POST['pass']);
$login=mysqli_query($koneksi, "SELECT * FROM users where user='$username' AND pass='$password'");
$result=mysqli_fetch_assoc($login);


if($username == $result['user'] && $password == $result['pass']) {
            echo "<script> alert ('BERHASIL LOGIN!');
                    document.location='index.php';
                 </script>";
} else{
        echo "<script> alert (' GAGAL LOGIN!');
                    document.location='login.php';
                 </script>";
}

?>