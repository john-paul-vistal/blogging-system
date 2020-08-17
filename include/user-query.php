<?php

    class User extends Database{

        protected function getAllUser(){
           $sql = "SELECT * FROM admins";
           $result = $this->connect()->query($sql);
           $numRows  = $result->num_rows;
           if($numRows > 0){
               while($row = $result->fetch_assoc()){
                  $data[] = $row;
               }
               return $data;
           }
        }

        protected function getAUser($id){
           $sql = "SELECT * FROM admins WHERE id = $id";
           $result = $this->connect()->query($sql);
           $numRows  = $result->num_rows;
           if($numRows > 0){
               while($row = $result->fetch_assoc()){
                  $data[] = $row;
               }
               return $data;
           }
        }

        protected function removeUser($deleteID){
            $sql = "DELETE FROM admins WHERE id = $deleteID";
            $this->connect()->query($sql);
        }

        protected function saveUser($data){
            $img = $data['imageUpload'];
            $userName = $data['username'];
            $password = $data['password'];
            $email = $data['email'];
            $fullname = $data['fullname'];
            $adminlevel = $data['adminlevel'];
            $sql = "INSERT INTO admins(img,userName,password,email,fullName,adminLevel) VALUES ('$img','$userName','$password','$email','$fullname','$adminlevel')";
           $this->connect()->query($sql);
        }

        protected function saveUpdateUser($data,$id){
            $img = $data['imageUpdate'];
            $userName = $data['username'];
            $password = $data['password'];
            $email = $data['email'];
            $fullname = $data['fullname'];
            $adminlevel = $data['adminlevel'];
            $sql = "UPDATE admins SET img = '$img',userName = '$userName',password='$password',email='$email',fullName='$fullname',adminLevel='$adminlevel' WHERE id = '$id'";
           $this->connect()->query($sql);
        }

    }

?>