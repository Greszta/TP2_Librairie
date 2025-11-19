<?php
namespace App\Controllers;

use App\Models\Livre;
use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Etat;
use App\Providers\View;
use App\Providers\Validator;


class LivreController{
    
    public function index(){
        $livre = new Livre;
        $select = $livre->select();
        
        return View::render("livre/index", ['livres' => $select]);
    }
    
    public function show($data = []){
        if(isset($data['id']) && $data['id']!=null){
            $livre = new Livre;
            $selectId = $livre->selectId($data['id']);
            if($selectId){
                
                $auteur_id =  $selectId['auteur_id'];
                
                $auteur = new Auteur;
                $selectAuteur = $auteur->selectId($auteur_id);
                if($selectAuteur){
                    $auteur = $selectAuteur['auteur'];
                }else{
                    $auteur = null;
                }
                
                $categorie_id =  $selectId['categorie_id'];
                
                $categorie = new Categorie;
                $selectCategorie = $categorie->selectId($categorie_id);
                if($selectCategorie){
                    $categorie = $selectCategorie['categorie'];
                }else{
                    $categorie = null;
                }
                
                $etat_id =  $selectId['etat_id'];
                
                $etat = new Etat;
                $selectEtat = $etat->selectId($etat_id);
                if($selectEtat){
                    $etat = $selectEtat['etat'];
                }else{
                    $etat = null;
                }
                
                return View::render("livre/show", ['livre' => $selectId, 'auteur'=> $auteur, 'categorie'=> $categorie, 'etat'=> $etat]);
            }else{
                return View::render('error', ['msg'=>'Livre not found!']);
            }
            
        }else{
            return View::render('error', ['msg'=>'404 page not found!']);
        }
    }
    
    public function create(){
        $auteur = new Auteur;
        $selectAuteur = $auteur->select('auteur');
        
        $categorie = new Categorie;
        $selectCategorie = $categorie->select('categorie');
        
        $etat = new Etat;
        $selectEtat = $etat->select('etat');
        
        return View::render('livre/create', ['auteurs'=>$selectAuteur, 'categories'=>$selectCategorie, 'etats'=>$selectEtat]);
    }
    
    public function store($data){
        $validator = new Validator;
        $validator->field('titre', $data['titre'])->required();
        $validator->field('annee', $data['annee'])->required()->min(4)->max(4);
        $validator->field('auteur_id', $data['auteur_id'], 'Auteur')->required()->int();
        $validator->field('categorie_id', $data['categorie_id'], 'Categorie')->required()->int();
        $validator->field('etat_id', $data['etat_id'], 'Etat')->required()->int();
        
        if($validator->isSuccess()){
            
            $livre = new Livre;
            $insert = $livre->insert($data);
            return View::redirect('livre/show?id='.$insert);
        }else{
            $errors = $validator->getErrors();
            
            $auteur = new Auteur;
            $selectAuteur = $auteur->select('auteur');
            
            $categorie = new Categorie;
            $selectCategorie = $categorie->select('categorie');
            
            $etat = new Etat;
            $selectEtat = $etat->select('etat');
            
            return View::render('livre/create', ['errors'=>$errors, 'auteurs'=>$selectAuteur, 'categories'=>$selectCategorie, 'etats'=>$selectEtat, 'livre'=>$data]);
        }
    }
    
    public function edit($data = []){
        if(isset($data['id']) && $data['id']!=null){
            $livre = new Livre;
            $selectId = $livre->selectId($data['id']);
            if($selectId){
                $auteur = new Auteur;
                $selectAuteur = $auteur->select('auteur');
                
                $categorie = new Categorie;
                $selectCategorie = $categorie->select('categorie');
                
                $etat = new Etat;
                $selectEtat = $etat->select('etat');
                
                return View::render('livre/edit', ['livre'=> $selectId, 'auteurs'=>$selectAuteur, 'categories'=>$selectCategorie, 'etats'=>$selectEtat]);
                
            }else{
                return View::render('error', ['msg'=>'Livre not found!']);
            }
            
        }else{
            return View::render('error', ['msg'=>'404 page not found!']);
        }
    }
    
    public function update($data=[], $get = [])
    {
        if(isset($get['id']) && $get['id']!=null){
            $validator = new Validator;
            $validator->field('titre', $data['titre'])->required();
            $validator->field('annee', $data['annee'])->required()->min(4)->max(4);
            $validator->field('auteur_id', $data['auteur_id'], 'Auteur')->required()->int();
            $validator->field('categorie_id', $data['categorie_id'], 'Categorie')->required()->int();
            $validator->field('etat_id', $data['etat_id'], 'Etat')->required()->int();
            
            if($validator->isSuccess()){
                
                $livre = new Livre;
                $update = $livre->update($data, $get['id']);
                
                if($update){
                    return View::redirect('livres');
                }else{
                    return View::render('error', ['msg'=>'Could not update!']);
                }
                
            }else{
                $errors = $validator->getErrors();
                
                $auteur = new Auteur;
                $selectAuteur = $auteur->select('auteur');
                
                $categorie = new Categorie;
                $selectCategorie = $categorie->select('categorie');
                
                $etat = new Etat;
                $selectEtat = $etat->select('etat');
                
                return View::render('livre/edit', ['errors'=>$errors, 'auteurs'=>$selectAuteur, 'categories'=>$selectCategorie, 'etats'=>$selectEtat, 'livre'=>$data]);
            }
            
        }else{
            return View::render('error', ['msg'=>'404 page not found!']);
        }
    }
    
    public function delete($data){
        $livre = new Livre;
        $delete = $livre->delete($data['id']);
        if($delete){
            return View::redirect('livres');
        }else{ 
            return View::render('error', ['msg'=>'Could not delete!']);
        }
    }
}



?>