<?php

class Books extends Entity {
    public static $tableName = 'spisak_knjiga';
    public static $keyColumn = 'knjiga_id';
    public static $order_Column = 'knjiga_id';
    public static $msg1 = 'Greška prilikom brisanja';
    public static $msg2 = 'Knjiga uspešno obrisana';
    public static $greska = "<h4 class='error'>Greška prilikom registracije</h4>";
    
}