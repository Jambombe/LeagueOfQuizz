 <?php

// Ne pas afficher les E_Warnings lors de la suppression d'une image si celle-ci n'existe pas
 // ini_set("display_errors",0);error_reporting(E_WARNING);

 class DAO {
         private $db; // L'objet de la base de donnée

         // Ouverture de la base de donnée
         function __construct($i) {

            $host = "localhost";
            $dbname = "league_of_quizz";

            if ($i == 0){
                $username = "selectUser";
                $psw = "select";

            } else if ($i == 1){
                $username = "insertUser";
                $psw = "insert";              
            }

            try{
              $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", "$username", "$psw");
            } catch (Exception $e){
                        die('Erreur : ' . $e->getMessage());
            }
         }

         

         function db(){
           return $this->db;
         }

         


}




  ?>
