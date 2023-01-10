<?php
include './StudentCollection.php';
class StudentMenu extends StudentCollection
{
    private $menuItems = array(1 => 'Create New Records', 2 => 'View All Records', 3 => 'Delete Records', 5 => 'Exit');

    public function showOption()
    {

        foreach ($this->menuItems as $option => $message) {
            echo "$option) $message \n";
        }
    }
    public function showMenu()
    {
        while (true) {
            $this->showOption();
            $choice = readline("Enter Your Choice : ");
            if ($choice == 5) {
                exit;
            }

            try {
                self::handleChoice($choice);
                // echo "Result : " . self::getResult() . "\n\n";
            } catch (Exception $ex) {
                echo $ex->getMessage() . "\n";;
            }
        }
    }
    public function handleChoice($choice)
    {
        switch ($choice) {
            case '1':
                try {
                    parent::createStudent();
                } catch (Exception $ex) {
                    echo $ex->getMessage() . "\n";;
                }
                break;
            case '2':
                try {
                    parent::showAllStudent();
                } catch (Exception $ex) {
                    echo $ex->getMessage() . "\n";;
                }

                break;
            case '3':
                try {
                    parent::deleteStudent();
                } catch (Exception $ex) {
                    echo $ex->getMessage() . "\n";;
                }
                break;
            default:
                self::echoit("Invalid Entry !!");
                break;
        }
    }
}


$studentmMenu = new StudentMenu();
$studentmMenu->showMenu();
