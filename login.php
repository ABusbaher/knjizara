<?php
include_once "include/nav.php";
?>
<div id="login-form" class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div class="form-login">
            <?php
        // LOGOVANJE KORISNIKA   // 
            if(isset($_POST['korisnicko_ime'], $_POST['sifra'])){
                $korisnicko_ime = trim($_POST['korisnicko_ime']);
                $sifra = trim($_POST['sifra']);
                if(!empty($korisnicko_ime) && !empty($sifra)){
                    $mdsifra = md5($sifra);
                    $korisnik = User::log_in($korisnicko_ime,$mdsifra);
                }else{
                    $greska = "Morate uneti i korisničko ime i lozinku";
                }
            }
        //  ISPIS GREŠKE  //
            if(isset($greska)) {
                     ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp;<strong> <?php echo $greska; ?>
                     </strong></div>
                     <?php
            }

            // ISPIS PORUKE KOD USPEŠNE REGISTRACIJE //
            if(isset($_GET['success'])){
                 ?>
                 <div class="alert alert-info">
                      <h4><i class="glyphicon glyphicon-log-in"></i> &nbsp;Uspešna registracija!</h4>
                      <p>Prijavite se ovde sa Vašim korisničkim imenom</p>
                 </div>
                 <?php
            }
            ?>
            <h4>Dobrodošli nazad</h4>
                <!--  ISPIS FORME  -->
            <form action="" method="post">
            <label for="korisnicko_ime">Korisnicko ime:</label>
            <input type="text" name="korisnicko_ime" value="<?php if(isset($greska)){echo $korisnicko_ime;}?>" class="form-control input-sm chat-input"/>
            </br>
            <label for="sifra">Lozinka:</label>
            <input type="password" name="sifra" class="form-control input-sm chat-input"/></br>
            <button type="submit" class="btn btn-primary btn-md" value="prijavi se">Prijavi se</button>
            </form>
            </div>
             <div class="login-a">
                <br /><a href="register.php">Nemate nalog registrujte se ovde</a>
             </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>