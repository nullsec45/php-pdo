<?php
namespace Repository;
use Model\Comment;

interface CommentRepository{
    function insert(Comment $comment) : Comment;
    function findById(int $id) : ?Comment;
    function findAll() : array;
}

class CommentRepositoryImpl implements CommentRepository{
    private $connection;
    public function __construct(\PDO $connection)
    {
        $this->connection=$connection;
    }
    public function insert(Comment $comment): Comment
    {
        // var_dump($comment);
        // die();
        $sql="INSERT INTO comments(email, comment) VALUES (?,?)";
        $statement=$this->connection->prepare($sql);
        $statement->execute([$comment->getEmail(), $comment->getComment()]);   

        // $id=$this->connection->lastInsertId();
        // $comment->setId($id);
        
        return $comment;
    }
    public function findById(int $id): ?Comment
    {
        $sql="SELECT * FROM comments WHERE id=?";
        $statement=$this->connection->prepare($sql);
        $statement->execute([$id]);

        if ($row=$statement->fetch()){
            return new Comment(
                $row["id"],
                $row["email"],
                $row["comment"]
            );
        }else{
            return null;
        }
    }
    public function findAll(): array
    {
        $sql="SELECT * FROM comments";
        $statement=$this->connection->query($sql);

        $array=[];

        while($row=$statement->fetch()){
            $array[]=new Comment(
                $row["id"],
                $row["email"],
                $row["comment"]
            );
        }
        return $array;
    }
    
    public function delete(?int $id) : bool{
        $sql="DELETE FROM comments WHERE id=?";

        if($this->findById($id) === null){
            echo "Data dengan id $id tidak ada di dalam database!.".PHP_EOL;
            return false;
        }else{
            $statement=$this->connection->prepare($sql);
            $statement->execute([$id]);
            
            return true;
        }

    }
    
}