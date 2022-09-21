<?php
namespace Model{
    class Comment{
        private $id, $email, $comment;
        public function __construct(?int $id=null, ?string $email=null, ?string $comment=null)
        {   
            $this->id=$id;
            $this->email=$email;
            $this->comment=$comment;
        }
        public function getId()
        {
            return $this->id;
        }
        public function setId($id)
        {
                $this->id = $id;
        }
        public function getEmail()
        {
                return $this->email;
        }
        public function setEmail($email)
        {
                $this->email = $email;
        }
        public function getComment()
        {
                return $this->comment;
        }
        public function setComment($comment)
        {
                $this->comment = $comment;
        }
    }
}  

     

      