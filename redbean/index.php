<?php
require "vendor/autoload.php";
// -- for custom method
class Model_Book extends RedBean_SimpleModel {
    public function uc_title() {
        return strtoupper($this->title);
    }
}
// --
use RedBean_Facade as R;

R::setup('sqlite:db.db');

echo "- create new beans -------------\n";
$book = R::dispense('book');
#var_dump($book);

echo "- pstore (and create) colum ----------------\n";
$book->title = 'this is my book';
$book->price = 100;
$book->author = 'uzulla';
$book->updated_at = date("Y-m-d H:i:s");
$book->created_at = date("Y-m-d H:i:s");

// insert (and create schema (and create database))
$id = R::store($book);
echo "last insert id ".$id."\n";

echo "-all bean count----------------\n";
echo R::count('book');

// get row hash.
$_book = R::getRow('SELECT * FROM book ORDER BY id ASC limit 1');
var_dump($_book);
$id = $_book['id'];

echo "-get one row----------------\n";
$some_book = R::load('book', $id); // id is pkey

echo $some_book->title;
echo $some_book->author;
echo $some_book->price;
echo $some_book->created_at;
echo "\n";

echo "- get all bean ----------------\n";
$all_book = R::findAll('book');
foreach($all_book as $b){
    echo $b->id. $b->title . "\n";
}

echo "- delete row --------------\n";
R::trash($some_book);
// or truncate ::wipe()


echo "- custom method ----------\n";
$id = R::getRow('SELECT * FROM book ORDER BY id ASC limit 1')['id'];
$custom_book = R::load('book', $id);
echo $custom_book->title ." uc to ". $custom_book->uc_title();



