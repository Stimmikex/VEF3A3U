<?php
class Books {
    private $books;

    public function __construct() {
        $this->books[] = array("name" => "", "author" => "", "pages" => "");
        $this->books[] = array("name" => "", "author" => "", "pages" => "");
        $this->books[] = array("name" => "", "author" => "", "pages" => "");
        $this->books[] = array("name" => "", "author" => "", "pages" => "");
        $this->books[] = array("name" => "", "author" => "", "pages" => "");
    }

    public function getBooks() {
        return $this->books;
    }

    public function getBookName($bookName) {
        $key = array_search($bookName, array_column($this->books, 'name'));
        return $this->books[$key];
    }

    public function getBookbyAuthor($cityName) {
        $keys = array_keys(array_column($this->books, 'pages'), $bookName);
        $bookarray = array();
        foreach ($keys as $value) {
            $bookarray[] = $this->books[$value];
        }
        return $cityarray;
    }

    public function addbook($name, $author, $pages) {
        $this->books[] = array("name" => $name, "author" => $author, "pages" => $pages);
    }
}
?>