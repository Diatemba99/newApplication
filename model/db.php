<?php
 class Connexion{
        private $host="127.0.0.1";
        private $dbname="draft_survey_nimba";
        private $user="root";
        private $mdp="";
       //  private $dbname="sc1ktcz3652_nimbaapp";
       //  private $user="sc1ktcz3652_nimbaapp";
       //  private $mdp="hEV+mk_U&jxv";
        private $db;
        
       public function getDB()
        {
        $this->db=null;
         try{
              $this->db=new PDO("mysql:dbname=$this->dbname;host=$this->host","$this->user","$this->mdp");
            }catch(Exception $e)
            {
            echo $e;
            }
        return $this->db;
        }

 
 }

?>