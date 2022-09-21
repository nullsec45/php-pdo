<?php


require_once __DIR__."./helper/database.php";
require_once __DIR__."./Model/Comment.php";
require_once __DIR__."./Repository/Comment.repo.php";

use Repository\CommentRepositoryImpl;
use Model\Comment;

$connection=getConnection();
$repository=new CommentRepositoryImpl($connection);

// Memasukkan data
$comment=new Comment(null, "anafath@gmail.com","HALO HALO BANDUNG");
$newComment=$repository->insert($comment);
if($newComment){echo "Sukses memasukkan data";}

// var_dump($newComment->getId());

// Mencari data berdasarkan id
// $comment=$repository->findById(100);
// var_dump($comment);

// Mencari semua data
// $comments=$repository->findAll();
// var_dump($comments);

// Menghapus data
// $comment=$repository->delete(30);
// echo ($comment) ? "Data berhasil dihapus!" : "";

$connection=null;