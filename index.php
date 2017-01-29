<?php
include_once 'include/nav.php';
//   PROVERA DA LI JE KORISNIK ULOGOVAN   //
Session::is_admin();

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
     <!--    ISPIS KNJIGA           -->
       <h1>Knjige</h1><br /><br />
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
             foreach ($knjige as $knjiga){
            ?>
            <tr>
                <td><?php echo $knjiga->naziv ?></td>
                <td><?php echo $knjiga->autor ?></td>
                <td><?php echo $knjiga->godina_izdanja ?></td>
                <td><?php echo $knjiga->prvi_jezik ?></td>
                <td><?php echo $knjiga->drugi_jezik ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
    <!--    ISPIS PAGINACIJE           -->
    <div class="row">
        <ul class="pager">
    <?php
    $paginate->render_pagination($page="index.php?page=");
    ?>
        </ul>
    </div>
   </div>
  </div>
</body>
</html>   