<?php
namespace App\Controllers;

use App\Providers\View;
use App\Models\User;
use App\Models\Privilege;
use App\Providers\Validator;
use App\Providers\Auth;

class UserController {

    public function __construct(){
        Auth::session();
        Auth::privilege(1);
    }

    public function index(){
        $user = new User;
        $select = $user->select();
        
        return View::render("user/index", ['users' => $select]);
    }

    public function create(){
        $privilege = new Privilege;
        $privileges = $privilege->select('privilege');
        return View::render('user/create', ['privileges' => $privileges]);
    }

    public function store($data){
         print_r($data);
        $validator = new Validator;
        $validator->field('name', $data['name'])->min(2)->max(50);
        $validator->field('username', $data['username'])->required()->max(50);
        $validator->field('password', $data['password'])->min(6)->max(20);
        $validator->field('email', $data['email'])->required()->max(50)->email();
        $validator->field('privilege_id', $data['privilege_id'], 'privilege')->required()->int();

        if($validator->isSuccess()){
            $user = new User;
            $data['password'] = $user->hashPassword($data['password']);
            
           $insert = $user->insert($data);
           if($insert){
                return view::redirect('users');
           }else{
                return view::render('error');
           }

        }else{
            $errors = $validator->getErrors();
            $privilege = new Privilege;
            $privileges = $privilege->select('privilege');
            return view::render('user/create', ['errors'=>$errors, 'privileges' => $privileges, 'user' =>$data]);
        }
    }
        public function delete($data){
        $user = new User;
        $delete = $user->delete($data['id']);
        if($delete){
            return View::redirect('users');
        }else{ 
            return View::render('error', ['msg'=>'Could not delete!']);
        }
    }

}

?>