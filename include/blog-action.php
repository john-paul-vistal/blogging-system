<?php

    class BlogAction extends Blogs{

        public function viewAllBlogs(){
            $data = $this->getAllBlogs();
            return $data;
        }

        public function viewMyBlogs($author_id){
            $data = $this->getMyBlogs($author_id);
            return $data;
        }

        public function viewABlog($id){
            $data = $this->getABlog($id);
            return $data;
        }
  

        public function addBlog($data){
            $this->saveBlog($data);
        }

        public function editBlog($data,$id){
            $this->saveUpdate($data,$id);
        }

        public function publish($date,$id){
            $this->savePublish($date,$id);
        }

        public function deleteBlog($deleteId){
            $this->removeBlog($deleteId);
        }

    }

?>