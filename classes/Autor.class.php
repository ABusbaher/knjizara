<?php
class Autor extends Entity{
    public static $tableName = 'autori';
    public static $keyColumn = 'autor_id';
    public static $param_column = 'autor';
    public static $greska = 'Greška pri unosu autora u bazu';

}