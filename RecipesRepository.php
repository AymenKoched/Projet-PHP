<?php
require_once 'Repository.php';

class RecipesRepository extends Repository
{
    public function __construct($tableName)
    {
            parent::__construct('recipes');
    }
}