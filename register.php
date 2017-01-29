<?php
include_once "include/nav.php";

if(isset($_POST['korisnicko_ime'],$_POST['sifra'],$_POST['sifraA'],$_POST['ime'],$_POST['prezime'],$_POST['email'])){
        $korisnicko_ime = trim($_POST['korisnicko_ime']);
        $sifra = trim($_POST['sifra']);
        $sifraA = trim($_POST['sifraA']);
        $ime = trim($_POST['ime']);
        $prezime = trim($_POST['prezime']);
        $email = trim($_POST['email']);
        if(!empty($korisnicko_ime) && !empty($sifra) && !empty($sifraA) && !empty($ime) && !empty($prezime) && !empty($email)){
            if($sifra !== $sifraA) {
                $error[] = "<strong>Lozinke se ne poklapaju</strong>";
            }else if(Username::already_exist($korisnicko_ime)){
                $error[] = "<strong>Korisničko ime već postoji,izaberite drugo</strong>";
            }else if(Email::already_exist($email)){
                $error[] = "<strong>Email već postoji u bazi,izaberite drugi</strong>";
            }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                 $error[] = "<strong>E-mail adresa nije validna</strong>";
            }else{
            //  UPIS KORISNIKA U BAZU  //
            $mdsifra = md5($sifra);
            $newUser = new User;
            $newUser->korisnicko_ime = $korisnicko_ime;
            $newUser->sifra = $mdsifra;
            $newUser->ime = $ime;
            $newUser->prezime = $prezime;
            $newUser->email = $email;
            echo $newUser->insert();
            header("Location:login.php?success");
            }
        }else{
             $error[] = "<strong>Sva polja moraju biti popunjena</strong>";
        }
     }
?>
<div id="login-form" class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div class="form-login">
            <h4>Registracija</h4>
            <?php
        //  ISPIS PORUKE  //
            if(isset($error)) {
                foreach($error as $error) {
                     ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
                }
            }
            ?>
            <!--  ISPIS FORME   -->
            <form action="" method="post">
            <label for="korisnicko_ime">Korisnicko ime:</label>
            <input type="text" name="korisnicko_ime" value="<?php if(isset($error)){echo $korisnicko_ime;}?>" class="form-control input-sm chat-input"/>
            </br>
            <label for="sifra">Lozinka:</label>
            <input type="password" name="sifra" class="form-control input-sm chat-input"/>
            </br>
            <label for="sifraA">Ponovi lozinku:</label>
            <input type="password" name="sifraA" class="form-control input-sm chat-input" />
            </br>
            <label for="ime">Ime:</label>
            <input type="text" name="ime" value="<?php if(isset($error)){echo $ime;}?>" class="form-control input-sm chat-input" />
            </br>
            <label for="prezime">Prezime:</label>
            <input type="text" name="prezime" value="<?php if(isset($error)){echo $prezime;}?>" class="form-control input-sm chat-input" />
            </br>
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php if(isset($error)){echo $email;}?>" class="form-control input-sm chat-input" />
            </br>
            <div class="wrapper">
            <button type="submit" class="btn btn-primary btn-md" value="Registrujte se">Registrujte se</button>
            </div>
            </form>
            <!--  KRAJ FORME   -->
             <div class="login-a">
                <br /><a href="login.php">Vec imate nalog prijavite se ovde</a>
             </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>