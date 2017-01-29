<?php
include_once 'include/nav.php';

//   PROVERA DA LI JE KORISNIK ULOGOVAN   //
Session::not_admin();

?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
    <?php
    if(isset($_POST['naslov'],$_POST['autor'],$_POST['godina_izdanja'],$_POST['prvi_jezik'],$_POST['drugi_jezik'])){
        if(!empty($_POST['naslov']) && !empty($_POST['autor']) && !empty($_POST['godina_izdanja']) && !empty($_POST['prvi_jezik']) && !empty($_POST['drugi_jezik'])){
            $naslov = trim($_POST['naslov']);
            $autor = trim($_POST['autor']);
            $godina_izdanja = trim($_POST['godina_izdanja']);
            $prvi_jezik = trim(strtolower($_POST['prvi_jezik']));
            $drugi_jezik = trim(strtolower($_POST['drugi_jezik']));
            if(is_numeric($godina_izdanja)){
            //  PROVERA AUTORA I JEZIKA I NJIHOVO UNOŠENJE U BAZU AKO VEĆ NE POSTOJE  //
                if(Jezik::already_exist($prvi_jezik) == false){
                    $noviJezik = new Jezik;
                    $noviJezik->jezik = $prvi_jezik;
                    echo $noviJezik->insert();
                }
                if (Jezik::already_exist($drugi_jezik) == false) {
                    $noviJezik = new Jezik;
                    $noviJezik->jezik = $drugi_jezik;
                    echo $noviJezik->insert();
                }
                if (Autor::already_exist($autor) == false) {
                    $noviJezik = new Autor;
                    $noviJezik->autor = $autor;
                    echo $noviJezik->insert();
                }           

                // ISPISIVANJE STRANIH KLJUČEVA RADI UPISA U BAZU      //
                $autor_id = Autor::get_foreign_id($autor);
                $autor_novi_id = $autor_id->autor_id;
                $jezik_id_prvi = Jezik::get_foreign_id($prvi_jezik);
                $jezik1_novi_id = $jezik_id_prvi->jezik_id;
                $jezik_id_drugi = Jezik::get_foreign_id($drugi_jezik);
                $jezik2_novi_id = $jezik_id_drugi->jezik_id;
                // UPIS KNJIGE U BAZU   //
                $novaKnjiga = new Books;
                $novaKnjiga->naziv = $naslov;
                $novaKnjiga->autor_id = $autor_novi_id;
                $novaKnjiga->godina_izdanja = $godina_izdanja;
                $novaKnjiga->jezik_id = $jezik1_novi_id;
                $novaKnjiga->originalni_jezik_id = $jezik2_novi_id;
                echo $novaKnjiga->insert();
                echo "<div class='alert alert-info'>
                    <h3><i class='glyphicon glyphicon-log-in'></i> &nbsp;
                    Knjiga uspešno dodata</h3></div>";
            }else{
              $error[]="Godina mora biti ispisana brojevima!";  
            }
        }else{
            $error[]="Sva polja moraju biti popunjena!";
        }
    }
   //   ISPIS GREŠKE        //
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
    <!--   ISPIS FORME        -->
    <h1>DODAJ KNJIGU</h1><br /><br />
    <form action="" method="POST">
        <label for="naslov">Naslov:</label>
        <input type="text" name="naslov" value="<?php if(isset($error)) echo $_POST['naslov'];?>" class="form-control input-sm chat-input"/>
        </br></br>
        <label for="autor">Autor:</label>
        <input type="text" name="autor" value="<?php if(isset($error)) echo $_POST['autor'];?>" class="form-control input-sm chat-input"/>
        </br></br>
        <label for="naslov">Godina izdanja:</label>
        <input type="text" name="godina_izdanja" value="<?php if(isset($error)) echo $_POST['godina_izdanja'];?>" class="form-control input-sm chat-input"/>
        </br></br>
        <label for="prvi_jezik">Jezik:</label>
        <input type="text" name="prvi_jezik" value="<?php if(isset($error)) echo $_POST['prvi_jezik'];?>" class="form-control input-sm chat-input"/>
        </br></br>
        <label for="drugi_jezik">Originalni jezik:</label>
        <input type="text" name="drugi_jezik" value="<?php if(isset($error)) echo $_POST['drugi_jezik'];?>" class="form-control input-sm chat-input"/>
        </br></br>
        <div>
            <button type="submit" class="btn btn-primary btn-md" value="Dodaj ovu knjigu">Dodaj ovu knjigu</button>
        </div>
    </form>
    <!--   KRAJ FORME        -->
    </div>
</div>
</body>
</html>   