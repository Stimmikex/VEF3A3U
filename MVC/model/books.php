<?php
// namespace model;
class Books {
    private $books;

    public function __construct() {
        $this->books[] = array("title" => "Gods", "author" => "Thor", "pages" => "123");
        $this->books[] = array("title" => "", "author" => "", "pages" => "");
        $this->books[] = array("title" => "", "author" => "", "pages" => "");
    }

    public function getBooks() {
        return $this->books;
    }

    // public function getBookName($bookName) {
    //     $key = array_search($bookName, array_column($this->books, 'title'));
    //     return $this->books[$key];
    // }

    // public function getBookbyAuthor($bookName) {
    //     $keys = array_keys(array_column($this->books, 'pages'), $bookName);
    //     $bookarray = array();
    //     foreach ($keys as $value) {
    //         $bookarray[] = $this->books[$value];
    //     }
    //     return $bookarray;
    // }

    public function addbook($title, $author, $pages) {
        $this->books[] = array("title" => $title, "author" => $author, "pages" => $pages);
    }
}
?>