<?php
include_once 'include/nav.php';

//   PROVERA DA LI JE KORISNIK ULOGOVAN   //
Session::not_admin();

// ISPIS PORUKE  //
if(isset($_SESSION['msg'])){
    ?>
<div class="alert alert-danger"><h3><i class="glyphicon glyphicon-warning-sign"></i> &nbsp;<?php echo "<h3>" .  $_SESSION['msg'] . "</h3>"; }
unset($_SESSION['msg'])?></div>
<?php if(isset($_SESSION['success_msg'])){?>
<div class="alert alert-info"><strong><?php echo $_SESSION['success_msg']; }
unset($_SESSION['success_msg'])?></strong>
</div>

<?php
// PRIPREMA PAGINACIJE //
$page = !empty($_GET['page']) ? (int)$_GET['page']:1;
$items_per_page=10;
$itc = Books::get_all();
$items_total_count = count($itc);
$paginate = new Pagination($page,$items_per_page,$items_total_count);
$limit = $items_per_page;
$offset = $paginate->offset();
// SELEKTOVANJE KNJIGA  //
$knjige = Join_tables::load_books($limit,$offset);
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
       <h1>Knjige</h1><br /><br />
       <div id="dodaj_knjigu">
       <a href="dodaj_knjigu.php" class="btn btn-primary btn-lg active" role="button">Dodaj knjigu</a>
       </div>
       <hr /><br /><br />
       <!--    ISPIS KNJIGA           --> 
<?php

    foreach ($knjige as $knjiga){
?>
    <h3>Naslov: <?php echo $knjiga->naziv ?></h3>
    <h5>Autor: <?php echo $knjiga->autor ?></h5>
    <h5>Godina izdanja: <?php echo $knjiga->godina_izdanja ?></h5>
    <h5>Jezik: <?php echo $knjiga->prvi_jezik  ?></h5>
    <h5>Originalni jezik: <?php echo $knjiga->drugi_jezik  ?></h5>
    <a class="btn btn-primary btn-lg active pull-left" href="obrisi_knjigu.php?id=<?php echo $knjiga->knjiga_id ?>" role="button">Obriši</a>
    <a class="btn btn-primary btn-lg active pull-right" href="izmeni_knjigu.php?id=<?php echo $knjiga->knjiga_id ?>" role="button">Izmeni</a><br /><br />
    <hr /><br /><br />
    <?php } ?>

<div class="row">
    <!--    ISPIS PAGINACIJE           -->
    <ul class="pager">
    <?php
        $paginate->render_pagination($page="admin.php?page=");
    ?>
    </ul>
 </div>
</div>
</div>
</body>
</html>   