<?php
require "vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as E;

$capsule = new E;
$capsule->addConnection([
    'driver'    => 'sqlite',
    'database'  => 'test.db',
]);
$capsule->bootEloquent();

class Book extends Illuminate\Database\Eloquent\Model {
    public function ucTitle(){
        return strtoupper($this->title);
    }
}

$book = new Book;
$book->author = 'uzulla';
$book->title = 'Is laravel nice?';
$book->save();

$books = Book::all();
foreach($books as $book){
    echo $book->title."\n";
}

$other_book = Book::first();

echo $other_book->title;
$other_book->title = "like a activerecord";
$other_book->save();
$id = $other_book->id;

$some_book = Book::find($id);
echo $some_book->title;

echo "{$some_book->title} uc {$some_book->ucTitle()}\n";

echo "delete test ".Book::count()." to ";

$delete_book = Book::first();
$delete_book->delete();
echo Book::count()."\n";



