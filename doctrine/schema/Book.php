<?php
/**
 * @Entity @Table(name="books")
 * @Entity(repositoryClass="Uzulla\Book")
 */
class Book
{
    /** @Id @Column(type="integer") @GeneratedValue */
    protected $id;
    /** @Column(type="string") */
    protected $author;
    /** @Column(type="string") */
    protected $title;

    public function getId()
    {
        return $this->id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($name)
    {
        $this->author = $name;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($name)
    {
        $this->title = $name;
    }
}
