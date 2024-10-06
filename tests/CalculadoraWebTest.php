<?php

require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverWait;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverExpectedCondition;

class CalculadoraWebTest extends TestCase
{
    protected $webDriver;

    public function setUp(): void
    {
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444', DesiredCapabilities::chrome());
        $this->webDriver->get('http://localhost/CalculatorPHPTests/src/');
    }
    public function tearDown(): void
    {
        $this->webDriver->quit();
    }

    public function testAdicao()
    {
        $wait = new WebDriverWait($this->webDriver, 10);
        $wait->until(
            WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector('.btn.btn-primary.btn-block'))
        );

        $num1 = $this->webDriver->findElement(WebDriverBy::id('num1'));
        $num2 = $this->webDriver->findElement(WebDriverBy::id('num2'));
        $operacao = $this->webDriver->findElement(WebDriverBy::id('operation'));

        $submit = $this->webDriver->findElement(WebDriverBy::cssSelector('.btn.btn-primary.btn-block'));

        $num1->sendKeys('5');
        $num2->sendKeys('3');
        $operacao->sendKeys('add');
        $submit->click();

        $wait->until(
            WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector('h3.resultado'))
        );

        $resultado = $this->webDriver->findElement(WebDriverBy::cssSelector('h3.resultado'));

        $resultadoTexto = str_replace('Resultado: ', '', $resultado->getText());

        $this->assertEquals('8', $resultadoTexto);
    }
}
