<?php
require_once("bootstrap.php");

$book = new \Uzulla\Book();
$book->setAuthor("uzulla");
$book->setTitle("Doctrine is toooo complex");

$entityManager->persist($book);
$entityManager->flush();

echo "Created Book with ID " . $book->getId() . "\n";

// get all
$bookRepository = $entityManager->getRepository('Book');
$books = $bookRepository->findAll();

foreach ($books as $book) {
    echo sprintf("-%s\n", $book->getTitle());
}

$some_book = \Uzulla\Book::find(1);
echo $some_book->getAuthor();

echo "{$some_book->getTitle} uc {$some_book->ucTitle()}";
