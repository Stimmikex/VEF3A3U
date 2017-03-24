<?php

/**
 * Class Songs
 * This is a demo Model class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Model;

use Mini\Core\Model;

class Book extends Model
{
    /**
     * Get all songs from database
     */
    public function getAllBooks()
    {
        $sql = "SELECT id, name, author, pages, description FROM book";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a song to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $name name
     * @param string $author author
     * @param string $pages pages
     */
    public function addBook($name, $author, $pages, $description)
    {
        $sql = "INSERT INTO book (name, author, pages, description) VALUES (:name, :author, :pages, :description)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':author' => $author, ':pages' => $pages, ':description' => $description);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $book_id Id of song
     */
    public function deleteBook($book_id)
    {
        $sql = "DELETE FROM book WHERE id = :book_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':book_id' => $book_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a song from database
     * @param integer $book_id
     */
    public function getBook($book_id)
    {
        $sql = "SELECT id, name, author, pages, description FROM book WHERE id = :book_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':book_id' => $book_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a song in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $name name
     * @param string $author author
     * @param string $pages pages
     * @param int $book_id Id
     */
    public function updateBook($name, $author, $pages, $book_id, $description)
    {
        $sql = "UPDATE book SET name = :name, author = :author, pages = :pages, description = :description WHERE id = :book_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':author' => $author, ':pages' => $pages, ':book_id' => $book_id, ':description' => $description);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfBooks()
    {
        $sql = "SELECT COUNT(id) AS amount_of_books FROM book";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_books;
    }
}
