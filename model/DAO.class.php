 <?php

// Ne pas afficher les E_Warnings lors de la suppression d'une image si celle-ci n'existe pas
 // ini_set("display_errors",0);error_reporting(E_WARNING);

 class DAO {
         private $db; // L'objet de la base de donnée

         // Ouverture de la base de donnée
         function __construct() {
           
           try{
              $this->db = new PDO('mysql:host=localhost;dbname=league_of_quizz;charset=utf8', 'root', '');
            } catch (Exception $e){
                    die('Erreur : ' . $e->getMessage());
            }
         }

         function db(){
           return $this->db;
         }

         


}




  ?>
