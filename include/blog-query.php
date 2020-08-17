<?php

    class Blogs extends Database{

        protected function getAllBlogs(){
           $sql = "SELECT * FROM blogs";
           $result = $this->connect()->query($sql);
           $numRows  = $result->num_rows;
           if($numRows > 0){
               while($row = $result->fetch_assoc()){
                  $data[] = $row;
               }
               return $data;
           }
        }
        protected function getAuthor($id){
           $sql = "SELECT author_id,fullName FROM blogs INNER JOIN admins ON blogs.author_id = admins.id WHERE admins.id = $id";
           $result = $this->connect()->query($sql);
           $numRows  = $result->num_rows;
           if($numRows > 0){
               while($row = $result->fetch_assoc()){
                  $data[] = $row;
               }
               return $data;
           }
        }

        // protected function getAUser($id){
        //    $sql = "SELECT * FROM admins WHERE id = $id";
        //    $result = $this->connect()->query($sql);
        //    $numRows  = $result->num_rows;
        //    if($numRows > 0){
        //        while($row = $result->fetch_assoc()){
        //           $data[] = $row;
        //        }
        //        return $data;
        //    }
        // }

        // protected function removeUser($deleteID){
        //     $sql = "DELETE FROM admins WHERE id = $deleteID";
        //     $this->connect()->query($sql);
        // }

        protected function saveBlog($data){
            $authorid = $data['authorid'];
            $title = $data['title'];
            $topic = $data['topic'];
            $content = addslashes($data['content']);
            $img = $data['featuredimage'];
            $sql = "INSERT INTO blogs(author_id,title,topic,content,img) VALUES ('$authorid','$title','$topic','$content','$img')";
           $this->connect()->query($sql);
        }

        // protected function saveUpdateUser($data,$id){
        //     $img = $data['imageUpdate'];
        //     $userName = $data['username'];
        //     $password = $data['password'];
        //     $email = $data['email'];
        //     $fullname = $data['fullname'];
        //     $adminlevel = $data['adminlevel'];
        //     $sql = "UPDATE admins SET img = '$img',userName = '$userName',password='$password',email='$email',fullName='$fullname',adminLevel='$adminlevel' WHERE id = '$id'";
        //    $this->connect()->query($sql);
        // }

    }

?>