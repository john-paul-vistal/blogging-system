<?php

    class BlogAction extends Blogs{

        public function viewAllBlogs(){
            $data = $this->getAllBlogs();
            return $data;
        }
        public function viewAuthor($id){
            $data = $this->getAuthor($id);
            return $data;
        }

        // public function viewAUser($id){
        //     $data = $this->getAUser($id);
        //     return $data;
        // }

        public function addBlog($data){
            $this->saveBlog($data);
        }

        // public function updateUser($data,$id){
        //     $this->saveUpdateUser($data,$id);
        // }

        // public function deleteUser($deleteId){
        //     echo $deleteId;
        //     $this->removeUser($deleteId);
        // }

    }

?>