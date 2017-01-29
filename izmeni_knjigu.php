<?php
include_once 'include/nav.php';

//   PROVERA DA LI JE KORISNIK ULOGOVAN   //
Session::not_admin();

?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">

<?php
//  PRIKUPLJANJE ID-a  //
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    if(!empty($id)){
        $knjiga = Join_tables::load_book_by_id($id);
    }else{
        header('Location: admin.php');
    }
}

if(isset($_POST['naslov'],$_POST['autor'],$_POST['godina_izdanja'],$_POST['prvi_jezik'],$_POST['drugi_jezik'])){
        if(!empty($_POST['naslov']) && !empty($_POST['autor']) && !empty($_POST['godina_izdanja']) && !empty($_POST['prvi_jezik']) && !empty($_POST['drugi_jezik'])){
            $naslov = trim(htmlspecialchars($_POST['naslov']));
            $autor = trim(htmlspecialchars($_POST['autor']));
            $godina_izdanja = trim(htmlspecialchars($_POST['godina_izdanja']));
            $prvi_jezik = trim(htmlspecialchars(strtolower($_POST['prvi_jezik'])));
            $drugi_jezik = trim(htmlspecialchars(strtolower($_POST['drugi_jezik'])));
            $knjiga_id = $knjiga->knjiga_id;
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
            // PRIKUPLJANJE STRANIH KLJUČEVA RADI UPISA U BAZU      //
                $autor_id = Autor::get_foreign_id($autor);
                $autor_novi_id = $autor_id->autor_id;
                $jezik_id_prvi = Jezik::get_foreign_id($prvi_jezik);
                $jezik1_novi_id = $jezik_id_prvi->jezik_id;
                $jezik_id_drugi = Jezik::get_foreign_id($drugi_jezik);
                $jezik2_novi_id = $jezik_id_drugi->jezik_id;
                
            //    UPIS IZMENA KNJIGE U BAZU   //     
                $izmenaKnjige = new Books;
                $izmenaKnjige->knjiga_id = $knjiga_id;
                $izmenaKnjige->naziv = $naslov;
                $izmenaKnjige->autor_id = $autor_novi_id;
                $izmenaKnjige->godina_izdanja = $godina_izdanja;
                $izmenaKnjige->jezik_id = $jezik1_novi_id;
                $izmenaKnjige->originalni_jezik_id = $jezik2_novi_id;           
                echo $izmenaKnjige->update();
                $_SESSION['success_msg'] = "Knjiga uspešno ažurirana";
                header('Location: admin.php');
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
    <h1>IZMENI KNJIGU</h1><br /><br />
    <form action="" method="POST">
        <label for="naslov">Naslov:</label>
        <input type="text" name="naslov" value="<?php echo $knjiga->naziv;?>" class="form-control input-sm chat-input"/>
        </br></br>
        <label for="autor">Autor:</label>
        <input type="text" name="autor" value="<?php echo $knjiga->autor;?>" class="form-control input-sm chat-input"/>
        </br></br>
        <label for="naslov">Godina izdanja:</label>
        <input type="text" name="godina_izdanja" value="<?php echo $knjiga->godina_izdanja;?>" class="form-control input-sm chat-input"/>
        </br></br>
        <label for="prvi_jezik">Jezik:</label>
        <input type="text" name="prvi_jezik" value="<?php echo $knjiga->prvi_jezik;?>" class="form-control input-sm chat-input"/>
        </br></br>
        <label for="drugi_jezik">Originalni jezik:</label>
        <input type="text" name="drugi_jezik" value="<?php echo $knjiga->drugi_jezik;?>" class="form-control input-sm chat-input"/>
        </br></br>
        <div>
            <button type="submit" class="btn btn-primary btn-md" value="Dodaj ovu knjigu">Izmeni ovu knjigu</button>
        </div>
    </form>
    <!--   KRAJ FORME        -->
    </div>
</div>
</body>
</html>   