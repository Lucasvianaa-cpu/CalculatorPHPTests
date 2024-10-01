*** Settings ***
Library    SeleniumLibrary
*** Variables ***
${URL}    http://localhost/calculadora/src/index.php

*** Test Cases ***
Testar Adicao Com Valores Positivos
    [Documentation]    Testar a funcionalidade de adição com valores positivos na calculadora
    Open Browser    ${URL}    chrome
    Input Text    name=num1    80
    Input Text    name=num2    4
    Select From List By Value    name=operation    add
    Click Button    xpath=//input[@type="submit"]

    Wait Until Page Contains Element    xpath=//div[contains(@class, "resultado") and contains(text(), "Resultado:")]    timeout=10

    ${resultado}=    Get Text    xpath=//div[contains(@class, "resultado")]
    
    Should Contain    ${resultado}    Resultado: 84
    Close Browser


*** Test Cases ***
Testar Subtracao Com Valores Positivos
    [Documentation] 
    Open Browser    ${URL}    chrome
    Input Text    name=num1    100
    Input Text    name=num2    50
    Select From List By Value    name=operation    subtract
    Click Button    xpath=//input[@type="submit"]
    Wait Until Page Contains Element    xpath=//div[contains(@class, "resultado")]
    ${resultado}=    Get Text    xpath=//div[contains(@class, "resultado")]
    Should Contain    ${resultado}    Resultado: 50
    Close Browser

Testar Divisao Com Zero
    [Documentation] 
    Open Browser    ${URL}    chrome
    Input Text    name=num1    10
    Input Text    name=num2    0
    Select From List By Value    name=operation    divide
    Click Button    xpath=//input[@type="submit"]
    Wait Until Page Contains Element    xpath=//div[contains(@class, "error")]
    ${erro}=    Get Text    xpath=//div[contains(@class, "error")]
    Should Contain    ${erro}    Erro: Divisão por zero não é permitida.
    Close Browser

