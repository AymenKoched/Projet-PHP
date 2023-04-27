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
    public function findById($id){
        $requete = "select * from $this->tableName where nom = ?";
        $reponse = $this->cnxPDO->prepare($requete);
        $reponse->execute([$id]);
        return $reponse->fetch(PDO::FETCH_OBJ);
    }
    public function isLikedByUser($comment_id, $user_id) {
        $comment = $this->findById($comment_id);
        $liked_by = $comment->Likers ? explode(',', $comment->Likers) : [];
        return in_array($user_id,$liked_by);
    }
    public function UpdateByName($nom,$params){
        $keys = array_keys($params);
        $setClause = implode('=?, ', $keys) . '=?';
        $requete = "UPDATE $this->tableName SET $setClause WHERE nom = ?";
        $values = array_values($params);
        $values[] = $nom;
        $reponse = $this->cnxPDO->prepare($requete);
        $reponse->execute($values);
        return $reponse->fetch(PDO::FETCH_OBJ);
    }


}
?>