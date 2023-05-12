<?php
require_once 'Repository.php';
class CommentRepository extends Repository
{
    public function __construct($tableName)
    {
        parent::__construct('comment');
    }
    public function findByRecipeId($recipeId){
        $requete = "select * from $this->tableName where recipeId = ?";
        $reponse = $this->cnxPDO->prepare($requete);
        $reponse->execute([$recipeId]);
        return $reponse->fetchAll(PDO::FETCH_OBJ);
    }
    public function findNumberByRecipeId($recipeId){
        $requete = "select count(*) from $this->tableName group by recipeId having recipeId = ?";
        $reponse = $this->cnxPDO->prepare($requete);
        $reponse->execute([$recipeId]);
        return $reponse->fetchColumn();
    }


    public function isLikedByUser($comment_id, $user_id) {
        $comment = $this->findById($comment_id);
        $liked_by = $comment->likers ? explode(',', $comment->likers) : [];
        return in_array($user_id,$liked_by);
    }

    public function DeleteByRecipeId($Recipeid){
        $requete = "delete from $this->tableName where recipeId = ?";
        $reponse = $this->cnxPDO->prepare($requete);
        $reponse->execute([$Recipeid]);
    }


}
?>
