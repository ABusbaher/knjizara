<?php

class User extends Entity {
	public static $tableName = 'korisnici';
	public static $keyColumn = 'korisnik_id';
    public static $order_Column = 'korisnik_id';
    public static $col1 = 'korisnicko_ime';
    public static $col2 = 'sifra';
    public static $msg1 = 'Neuspešno brisanje';
    public static $msg2 = 'The user successfully deleted';
    public static $msg3 = 'Nepoznat korisnik';
    public static $msg4 = 'Greška u prijavi';
    public static $poruka = 'Failure to delete!';
    public static $greska = "<h4 class='error'>Greška prilikom registracije</h4>";
	
}