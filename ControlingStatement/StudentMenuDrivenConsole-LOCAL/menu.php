<?php
include './StudentCollection.php';
class StudentMenu extends StudentCollection
{
    private $menuItems = array(1 => 'Create New Records', 2 => 'View All Records', 3 => 'Delete Records',  4 => 'Update Records', 5 => 'Search Records', 6 => 'Exit');

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
        switch ($choice) {
            case '1':
                parent::createStudent();
                break;
            case '2':
                parent::showAllStudent();
                break;
            case '3':
                parent::deleteStudent();
                break;
            case '4':
                parent::updateStudent();
                break;
            case '5':
                parent::searchStudent();
                break;
            default:
                parent::errorHandler("DATABASE_EMPTY");
                break;
        }
    }
}

$studentmMenu = new StudentMenu();
$studentmMenu->showMenu();
