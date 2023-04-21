<?php
require_once 'Repository.php';
class CommentRepository extends Repository
{
    public function __construct($tableName)
    {
        parent::__construct('comment');
    }
    public function findByRecipeId($recipeId){
        $requete = "select * from $this->tableName where RecipeId = ?";
        $reponse = $this->cnxPDO->prepare($requete);
        $reponse->execute([$recipeId]);
        return $reponse->fetchAll(PDO::FETCH_OBJ);
    }

}
?>