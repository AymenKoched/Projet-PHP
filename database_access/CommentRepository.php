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
    public function findNumberByRecipeId($recipeId){
        $requete = "select count(*) from $this->tableName group by RecipeId having RecipeId = ?";
        $reponse = $this->cnxPDO->prepare($requete);
        $reponse->execute([$recipeId]);
        return $reponse->fetchColumn();
    }


    public function isLikedByUser($comment_id, $user_id) {
        $comment = $this->findById($comment_id);
        $liked_by = $comment->Likers ? explode(',', $comment->Likers) : [];
        return in_array($user_id,$liked_by);
    }

    public function DeleteByRecipeID($Recipeid){
        $requete = "delete from $this->tableName where RecipeId = ?";
        $reponse = $this->cnxPDO->prepare($requete);
        $reponse->execute([$Recipeid]);
    }


}
?>