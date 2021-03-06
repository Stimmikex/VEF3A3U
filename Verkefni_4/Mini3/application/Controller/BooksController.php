<?php

/**
 * Class SongsController
 * This is a demo Controller class.
 *
 * If you want, you can use multiple Models or Controllers.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Model\Book;

class BooksController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index()
    {
        // Instance new Model (book)
        $book = new Book();
        // getting all songs and amount of songs
        $books = $book->getAllBooks();
        $amount_of_books = $book->getAmountOfBooks();

       // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/books/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: addSong
     * This method handles what happens when you move to http://yourproject/songs/addsong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a song" form on songs/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addBook()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_book"])) {
            // Instance new Model (Song)
            $book = new Book();
            // do addSong() in model/model.php
            $book->addBook($_POST["name"], $_POST["author"],  $_POST["pages"], $_POST['description']);
        }

        // where to go after song has been added
        header('location: ' . URL . 'books/index');
    }

    /**
     * ACTION: deleteSong
     * This method handles what happens when you move to http://yourproject/songs/deletesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a song" button on songs/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $book_id Id of the to-delete song
     */
    public function deleteBook($book_id)
    {
        // if we have an id of a song that should be deleted
        if (isset($book_id)) {
            // Instance new Model (book)
            $book = new book();
            // do deleteSong() in model/model.php
            $book->deleteBook($book_id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'books/index');
    }

     /**
     * ACTION: editSong
     * This method handles what happens when you move to http://yourproject/songs/editsong
     * @param int $song_id Id of the to-edit song
     */
    public function editBook($book_id)
    {
        // if we have an id of a song that should be edited
        if (isset($book_id)) {
            // Instance new Model (book)
            $Book = new Book();
            // do getSong() in model/model.php
            $book = $Book->getBook($book_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $song easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/books/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to songs index page (as we don't have a song_id)
            header('location: ' . URL . 'books/index');
        }
    }

    /**
     * ACTION: updateSong
     * This method handles what happens when you move to http://yourproject/songs/updatesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a song" form on songs/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function updateBook()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_update_book"])) {
            // Instance new Model (Book)
            $Book = new Book();
            // do updateSong() from model/model.php
            $Book->updateBook($_POST["name"], $_POST["author"],  $_POST["pages"], $_POST['book_id'], $_POST['description']);
        }

        // where to go after song has been added
        header('location: ' . URL . 'books/index');
    }

}
