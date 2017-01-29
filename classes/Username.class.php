<?php
class Username extends Entity{
    public static $tableName = 'korisnici';
    public static $keyColumn = 'korisnik_id';
    public static $param_column = 'korisnicko_ime';
}