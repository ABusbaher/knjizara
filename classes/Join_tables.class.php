<?php
class Join_tables{

            //  ISPIS SVIH KNJIGA OD NAJNOVIJE U BAZI   //
    public static function load_books($limit,$offset){
        $db = Connect::getInstance();
        $className = get_called_class();
        $res = $db->query("SELECT spisak_knjiga.knjiga_id, spisak_knjiga.naziv,spisak_knjiga.godina_izdanja, autori.autor, jezik1.jezik as 'prvi_jezik', jezik2.jezik as 'drugi_jezik'
                FROM spisak_knjiga 
                LEFT JOIN autori ON autori.autor_id = spisak_knjiga.autor_id
                LEFT JOIN jezik jezik1 ON jezik1.jezik_id = spisak_knjiga.jezik_id
                LEFT JOIN jezik jezik2 ON jezik2.jezik_id = spisak_knjiga.originalni_jezik_id ORDER BY spisak_knjiga.knjiga_id DESC LIMIT " . $limit . " OFFSET " . $offset);
       if($res->rowCount() == 0){
            echo '<h3>Nema knjiga za ovu pretragu</h3>';
            $arr = array();
            return $arr;
        }else{          
            $arr = array();
            while($r = $res->fetchObject($className)){
            $arr[] = $r;
            }
            return $arr;
        }
    }

                // ISPIS KNJIGE PREMA ID-u //
    public static function load_book_by_id($id){
        $db = Connect::getInstance();
        $className = get_called_class();
        $res = $db->query("SELECT spisak_knjiga.knjiga_id, spisak_knjiga.naziv,spisak_knjiga.godina_izdanja, autori.autor, jezik1.jezik as 'prvi_jezik', jezik2.jezik as 'drugi_jezik'
                FROM spisak_knjiga 
                LEFT JOIN autori ON autori.autor_id = spisak_knjiga.autor_id
                LEFT JOIN jezik jezik1 ON jezik1.jezik_id = spisak_knjiga.jezik_id
                LEFT JOIN jezik jezik2 ON jezik2.jezik_id = spisak_knjiga.originalni_jezik_id WHERE spisak_knjiga.knjiga_id = $id");
        $res = $res->fetchObject($className);
        return $res;
    }

            //  PRETRAGA KNJIGA PO AUTORU ILI GODINI IZDANJA  //
    public static function search($pretraga){
        $db = Connect::getInstance();
        $className = get_called_class();
        $res = $db->prepare("SELECT spisak_knjiga.knjiga_id, spisak_knjiga.naziv,spisak_knjiga.godina_izdanja, autori.autor, jezik1.jezik as 'prvi_jezik', jezik2.jezik as 'drugi_jezik'
                FROM spisak_knjiga 
                LEFT JOIN autori ON autori.autor_id = spisak_knjiga.autor_id
                LEFT JOIN jezik jezik1 ON jezik1.jezik_id = spisak_knjiga.jezik_id
                LEFT JOIN jezik jezik2 ON jezik2.jezik_id = spisak_knjiga.originalni_jezik_id WHERE spisak_knjiga.godina_izdanja LIKE ? OR autori.autor LIKE ?");
        $res->bindValue(1, '%' . $pretraga . '%');
        $res->bindValue(2, '%' . $pretraga . '%');
        $res->execute();
        
        if($res->rowCount() > 0){
            $arr = array();
            while($r = $res->fetchObject($className)){
                $arr[] = $r;
            }
            return $arr;
        }else{
            echo "<h3>Nema rezultata po ovoj pretrazi</h3>";
            $arr = array();
            return $arr;
        }
    }
}