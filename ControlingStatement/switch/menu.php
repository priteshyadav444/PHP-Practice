<?php
require '../ValidateProgram/Validate.php';
abstract class Menu extends Validate
{
    public $menuItem = array(5 => "Exit");
    public abstract function displayMenu();
    public abstract function handleChoice($choice);
}
