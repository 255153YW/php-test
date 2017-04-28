<?php
require 'controllers/PagesController.php';

class CRUDController extends PagesController {
    var $owner;
  
    function set_owner ($name) {
        $this->owner = $name;
    }
}
?>
