<?php
include_once 'include/nav.php';

//   PROVERA DA LI JE KORISNIK ULOGOVAN   //
Session::not_admin();
//   PRIKUPLJANJE ID-a  //
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    if(!empty($id)){
        Books::remove($id);
        header('Location: admin.php');
    }else{
        header('Location: admin.php');
    }
}
?>
</body>
</html>   