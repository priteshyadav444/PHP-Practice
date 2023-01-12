<?php
require '../ValidateProgram/Validate.php';
include './DB.php';
class Menu extends Validate
{
    public $menuItems = array(1 => "Show All Tables", 2 => "Show Table Data", 6 => "Exit");
    public function showOption()
    {
        foreach ($this->menuItems as $option => $message)
            parent::echoit("$option) $message", 1);
    }
    public function showMenu()
    {
        while (true) {
            $this->showOption();
            $choice = readline("Enter Your Choice : ");
            if ($choice == 6) {
                exit;
            }
            self::handleChoice($choice);
        }
    }
    public function handleChoice($choice)
    {
        $db = new DB();
        switch ($choice) {
            case '1':
                $db->showAllTables();
                break;
            case '2':
                $db->showTableData();
                break;
            default:
                Validate::errorHandler("DATABASE_EMPTY");
                break;
        }
    }
}
$menu = new Menu();
$menu->showMenu();
