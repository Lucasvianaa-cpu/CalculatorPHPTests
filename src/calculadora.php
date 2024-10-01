<?php
class DivisionByZeroException extends Exception
{
    public function __construct($message = "Erro: Divisão por zero")
    {
        parent::__construct($message);
    }
}

class InvalidOperationException extends Exception
{
    public function __construct($message = "Erro: Operação inválida.")
    {
        parent::__construct($message);
    }
}

function calcular($num1, $num2, $operation)
{
    $result = null;

    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            if ($num2 === 0) {
                throw new DivisionByZeroException();
            }
            $result = $num1 / $num2;
            break;
        default:
            throw new InvalidOperationException();
    }

    return $result;
}
