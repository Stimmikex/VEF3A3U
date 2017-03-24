<?php
// namespace cont;
include_once 'model/books.php';
include_once 'view/view.php';

class Controller {

    //put your code here
    private $view;
    private $books;

    public function handle() {
        $this->books = new Books();
        $this->view = new View();
        $this->view->assign("book", $this->books->getBooks());
        if (isset($_SERVER['PATH_INFO'])) {
            $pathinfo = explode("/", $_SERVER['PATH_INFO']);

            switch ($pathinfo[0]) {
                // case "getBookName";
                //     $this->getBookName(urldecode(trim($pathinfo[1])));
                //     break;
                // case "getBookbyAuthor":
                //     $this->getBookbyAuthor(urldecode(trim($pathinfo[1])));
                //     break;
                 default:
                     $this->view->display("./index.php");
            }
        }
        else {
            $this->view->display("./index.php");
        }
    }
}
