<?php
require './Validate.php';
abstract class MenuDriven extends Validate
{
    public abstract function displayMenu();
    public abstract function handleChoice($choice);
}

class CalculatorMenu extends MenuDriven
{
    protected $num1;
    protected $num2;
    private $result;
    public $operation;
    const DATATYEPE_INT = 'int';
    const DATATYEPE_STRING = 'string';

    public function displayMenu()
    {
        while (true) {
            echo "1) Addition \n";
            echo "2) Substraction \n";
            echo "3) Divide \n";
            echo "4) Multiplication \n";
            echo "5) Exit \n";
            $choice = readline("Enter Your Choice : ");
            if ($choice == 5) {
                exit;
            }

            try {
                self::handleChoice($choice);
                echo "Result : " . self::getResult() . "\n\n";
            } catch (DivisionByZeroError $th) {
                echo "Error : Cannot Divide by a Number with Zero \n";
            } catch (Exception $ex) {
                echo $ex->getMessage() . "\n";;
            }
        }
    }
    public function handleChoice($operation)
    {
        $this->num1 = self::validateInput(readline("Enter Number 1 : "), self::DATATYEPE_INT);
        $this->num2 = self::validateInput(readline("Enter Number 2 : "), self::DATATYEPE_INT);

        $this->operation = $operation;

        switch ($this->operation) {
            case '+':
            case 'add':
            case 1:
                $this->result = (float)$this->num1 + $this->num2;
                break;
            case '-':
            case 'substract':
            case 2:
                $this->result = (float)($this->num1 - $this->num2);
                break;
            case '/':
            case 'divide':
            case 3:
                $this->result = (float)($this->num1 / $this->num2);
                break;
            case '*':
            case 'multiply':
            case 4:
                $this->result = (float)$this->num1 * $this->num2;
                break;
            default:
                $this->result = "Invalid Operation";
        }
    }

    public function getResult()
    {
        return $this->result;
    }
}

$calulatorMenu = new CalculatorMenu();
$calulatorMenu->displayMenu();
