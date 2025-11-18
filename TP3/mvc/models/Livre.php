<?php
namespace App\Models;
use App\Models\CRUD;

class Livre extends CRUD{
    protected $table = 'livre';
    protected $primaryKey = 'id';
    protected $fillable = ['titre', 'annee', 'auteur_id', 'categorie_id', 'etat_id'];
    
}