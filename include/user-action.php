<?php

    class UserAction extends User{

        public function viewAllUser(){
            $data = $this->getAllUser();
            return $data;
        }
        public function viewAUser($id){
            $data = $this->getAUser($id);
            return $data;
        }

        public function addUser($data){
            $this->saveUser($data);
        }
        public function updateUser($data,$id){
            $this->saveUpdateUser($data,$id);
        }

        public function deleteUser($deleteId){
            echo $deleteId;
            $this->removeUser($deleteId);
        }

        public function loginValidation($userName,$password){
            $datas = $this->getAllUser();
            foreach($datas as $data){
                if($data['userName'] == $userName && $data['password'] == $password){
                     return $data['id'];
                }
            }
           
        }


    }

?>