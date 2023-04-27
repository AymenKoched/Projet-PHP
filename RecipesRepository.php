<?php
require_once 'Repository.php';

class RecipesRepository extends Repository
{
    public function __construct($tableName)
    {
            parent::__construct('recipes');
    }
    public function findByNom($name){
        $requete = "select * from $this->tableName where nom = ? ";
        $reponse = $this->cnxPDO->prepare($requete);
        $reponse->execute([$name]);
        return $reponse->fetch(PDO::FETCH_OBJ);
    }

    public function searchByName($name) {
        $query = "SELECT * FROM {$this->tableName} WHERE nom LIKE ?";
        $stmt = $this->cnxPDO->prepare($query);
        $stmt->execute(['%' . $name . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}