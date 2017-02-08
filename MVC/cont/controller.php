<?php
include_once 'books.php';
include_once 'view/view.php';

class Controller {

    //put your code here
    private $viewHelper;
    private $books;

    public function handle() {
        //$this=new Program2_1_PageController();
        $this->books = new Books();
        $this->viewHelper = new View();
        //alway set this data
        $this->viewHelper->assign("persons", $this->books->getAllPersons());
        if (isset($_SERVER['PATH_INFO'])) {
            //index.php/PageController/getPersonByName/Austin
            $pathinfo = explode("/", $_SERVER['PATH_INFO']);

            switch ($pathinfo[2]) {//$arr[2]=getPersonByName
                case "getBookName";
                    //$arr[3]="Dustin"
                    $this->getBookName(urldecode(trim($pathinfo[3])));
                    break;
                case "getBookbyAuthor":
                    //$arr[3]="New York"
                    $this->getBookbyAuthor(urldecode(trim($pathinfo[3]))); //getPersonsByCity("New York");
                    break;
                default:
                    $this->viewHelper->display("./index.php");
            }//end case
        }//end if
        else {
            
            $this->viewHelper->display("./index.php");
        }
    }

//end handle

    public function getBookName($name) {

        $this->viewHelper->assign("person", $this->books->getBookName($name));
        $this->viewHelper->display("./index.php");
    }

    public function getBookbyAuthor($city) {

        $this->viewHelper->assign("personsInCities", $this->books->getBookbyAuthor($city));
        $this->viewHelper->display("./index.php");
    }

}
?>