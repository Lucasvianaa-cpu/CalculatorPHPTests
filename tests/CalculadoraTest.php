<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'src/calculadora.php';

use PHPUnit\Framework\TestCase;

class CalculadoraTest extends TestCase
{
    public function testAdicao()
    {
        $resultado = calcular(5, 3, 'add');
        $this->assertEquals(8, $resultado);

        $resultado = calcular(0, 0, 'add');
        $this->assertEquals(0, $resultado);

        $resultado = calcular(-5, -3, 'add');
        $this->assertEquals(-8, $resultado);
    }

    public function testSubtracao()
    {
        $resultado = calcular(5, 3, 'subtract');
        $this->assertEquals(2, $resultado);

        $resultado = calcular(5, 5, 'subtract');
        $this->assertEquals(0, $resultado);

        $resultado = calcular(3, 5, 'subtract');
        $this->assertEquals(-2, $resultado);
    }

    public function testMultiplicacao()
    {
        $resultado = calcular(5, 3, 'multiply');
        $this->assertEquals(15, $resultado);

        $resultado = calcular(5, 0, 'multiply');
        $this->assertEquals(0, $resultado);

        $resultado = calcular(-5, 3, 'multiply');
        $this->assertEquals(-15, $resultado);
    }

    public function testDivisao()
    {
        $resultado = calcular(6, 3, 'divide');
        $this->assertEquals(2, $resultado);

        $resultado = calcular(5, 5, 'divide');
        $this->assertEquals(1, $resultado);

        $resultado = calcular(-6, 3, 'divide');
        $this->assertEquals(-2, $resultado);
    }

    public function testDivisaoPorZero()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Erro: Divisão por zero");
        calcular(5, 0, 'divide');
    }

    public function testOperacaoInvalida()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Erro: Operação inválida.");
        calcular(5, 3, 'invalid_operation');
    }
}
