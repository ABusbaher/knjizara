<?php
include_once 'include/nav.php';
 ?>
 <div class="row">
    <div class="col-md-6 col-md-offset-3">
<?php
    if(isset($_POST['pretraga'])){
        $pretraga = trim($_POST['pretraga']);
        if(!empty($pretraga)){
            $pretraga = Join_tables::search($pretraga);
            ?>
            <h3>REZULTATI PRETRAGE:</h3><br /><br />
                    <!--    ISPIS PRETRAGE           -->
        <table class="table table-striped table-inverse">
        <thead>
            <tr>
                <th>Naziv</th>
                <th>Autor</th>
                <th>God.izdavanja</th>
                <th>Jezik</th>
                <th>Originalni jezik</th>
            </tr>
        </thead>
        <tbody>
        <?php
             foreach ($pretraga as $p){
            ?>
            <tr>
                <td><?php echo $p->naziv ?></td>
                <td><?php echo $p->autor ?></td>
                <td><?php echo $p->godina_izdanja ?></td>
                <td><?php echo $p->prvi_jezik ?></td>
                <td><?php echo $p->drugi_jezik ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

                    <!--  ISPIS GREŠKE -->
    <?php
        }else{
            echo "<div class='alert alert-danger'>
                    <h3><i class='glyphicon glyphicon-warning-sign'></i> &nbsp;
                    Niste uneli tekst</h3></div>";
        }
    }
    ?>
            <!--  ISPIS FORME -->
    <br /><br />
    <form class="form-inline" action="" method="post">
        <label for="pretraga">Pretraži knjige po autoru ili godini izdavanja: </label>
        <input type="text" class="form-control" name="pretraga"/>   <button type="submit" class="btn btn-primary btn-md pull-right" value="pretraži">pretraži</button>
    </form>
    
    
    </div>
</div>