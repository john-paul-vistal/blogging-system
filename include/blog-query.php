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
        protected function getMyBlogs($author_id){
           $sql = "SELECT * FROM blogs WHERE author_id = $author_id";
           $result = $this->connect()->query($sql);
           $numRows  = $result->num_rows;
           if($numRows > 0){
               while($row = $result->fetch_assoc()){
                  $data[] = $row;
               }
               return $data;
           }
        }

        protected function getABlog($id){
           $sql = "SELECT * FROM blogs WHERE id = $id";
           $result = $this->connect()->query($sql);
           $numRows  = $result->num_rows;
           if($numRows > 0){
               while($row = $result->fetch_assoc()){
                  $data[] = $row;
               }
               return $data;
           }
        }

        protected function removeBlog($deleteID){
            $sql = "DELETE FROM blogs WHERE id = $deleteID";
            $this->connect()->query($sql);
        }

        protected function saveBlog($data){
            $authorid = $data['authorid'];
            $title = $data['title'];
            $topic = $data['topic'];
            $content = addslashes($data['content']);
            $img = $data['featuredimage'];
            $sql = "INSERT INTO blogs(author_id,title,topic,content,img) VALUES ('$authorid','$title','$topic','$content','$img')";
           $this->connect()->query($sql);
        }

        protected function saveUpdate($data,$id){
            $title = $data['title'];
            $topic = $data['topic'];
            $content = addslashes($data['content']);
            $img = $data['imageUpdate'];
            $sql = "UPDATE  blogs SET title = '$title',topic = '$topic',content = '$content',img = '$img' WHERE id = $id";
           $this->connect()->query($sql);
        }

    }

?>