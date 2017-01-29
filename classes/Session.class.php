<?php
class Session{

    //  SINGLTON SESIJA   //
    private $signed_in = false;
    private static $_sessionStarted = false;
    public $korisnik = array();
    public $korisnik_id;
    public $korisnicko_ime;
    public $message;
    public static function start(){
        if(self::$_sessionStarted == false){
            session_start();
            self::$_sessionStarted == true;
        }
    }

    //   DODELJIVANJE SESIJE ULOGOVANOM KORISNIKU   // 
    public static function login($korisnik){
        if($korisnik){
            $korisnik_id = $_SESSION['korisnik_id'] = $korisnik['korisnik_id'];
            $korisnicko_ime = $_SESSION['korisnicko_ime'] = $korisnik['korisnicko_ime'];
            $signed_in = true;
        }
    }

    //  ODJAVA KORISNIKA   //
    public static function logout(){
        session_start();
        session_destroy();
        header('Location:login.php');
    }

     //  PREBACIVANJE ULOGOVANOG KORISNIKA   //
    public static function is_admin(){
        if(isset($_SESSION['korisnik_id'])){
            header("Location:admin.php");
        }
    }

    //  PREBACIVANJE NEULOGOVANOG KORISNIKA   //
    public static function not_admin(){
        if(!isset($_SESSION['korisnik_id'])){
            header("Location:login.php");
        }
    }
    
    //   ISPIS NAVIGACIJE AKO JE KORISNIK ULOGOVAN ILI NIJE  //
    public static function check_the_login_nav($str){
      if(isset($_SESSION['korisnik_id'])){
        echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span>Hi ' .strtoupper($_SESSION['korisnicko_ime']) . '</a></li>';
        echo '<li><a href=' . $str . '><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
      }else{
        echo '<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
        echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
      }
    }
}
