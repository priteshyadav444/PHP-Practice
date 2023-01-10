<?php
class Calculator
{
    protected $num1;
    protected $num2;
    protected $operation;
    protected $result;
    public function __construct(float $num1, float $num2, $operation)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->operation = $operation;
    }

    public function getResult()
    {
        return $this->result;
    }
    public function calcalate()
    {
        switch ($this->operation) {
            case '+':
                $this->result = (float)$this->num1 + $this->num2;
                break;
            case '-':
                $this->result = (float)($this->num1 - $this->num2);
                break;
            case '/':
                $this->result = (float)($this->num1 / $this->num2);
                break;
            case '*':
                $this->result =(float)$this->num1 * $this->num2;
                break;
            default:
                $this->result = "Invalid Operation";
        }
    }
}
