<?php
// namespace view;
class View {
    private $data=array();
    public function assign($key,$value){
        $this->data[$key]=$value;
    }
    public function display($index){
        extract($this->data);        
        include_once $index;
        
    }
}
?>