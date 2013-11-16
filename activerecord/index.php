<?php
require "vendor/autoload.php";

class Book extends ActiveRecord\Model {
    public function ucTitle(){
        return strtoupper($this->title);
    }
}

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('.');
    $cfg->set_connections(array('development' => 'sqlite://test.db'));
});

//print_r(Book::first()->attributes());

// insert one.
$book = Book::create(['author'=>'uzulla', 'title'=>'how to make benz code.']);

// create
$mozbook = new Book();
$mozbook->author="moznion";
$mozbook->title="how to quit school";
$mozbook->save();

//custom function 
echo "{$mozbook->title} to upper {$mozbook->ucTitle()}\n";

$id = $mozbook->id;
$other_mozbook = Book::find($id);
var_dump($other_mozbook->attributes());

$books = Book::find('all');
foreach($books as $book){
    echo "ID: {$book->id} title:{$book->title}\n";
}

echo "delete from ". Book::count()."\n";
$to_delete_book = Book::find('first');
$to_delete_book->delete();
echo "delete to ".Book::count()."\n";



