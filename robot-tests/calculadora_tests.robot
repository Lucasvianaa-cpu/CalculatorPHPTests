*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}    http://localhost/CalculatorPHPTests/src/index.php
${CHROMEDRIVER_PATH}    /usr/local/bin/chromedriver

*** Test Cases ***
Testar Adicao Com Valores Positivos
    [Documentation]   
    Open Browser    ${URL}    chrome    
    Input Text    name=num1    80
    Input Text    name=num2    4
    Select From List By Value    name=operation    add
    Click Button    xpath=//button[text()='Calcular']

    Wait Until Page Contains Element    xpath=//h3[contains(@class, "resultado")]    timeout=30
    ${resultado}=    Get Text    xpath=//h3[contains(@class, "resultado")]
    Should Contain    ${resultado}    Resultado: 84
    Close Browser

Testar Subtracao Com Valores Positivos
    [Documentation]    
    Open Browser    ${URL}    chrome    
    Input Text    name=num1    100
    Input Text    name=num2    50
    Select From List By Value    name=operation    subtract
    Click Button    xpath=//button[text()='Calcular']

    Wait Until Page Contains Element    xpath=//h3[contains(@class, "resultado")]    timeout=30
    ${resultado}=    Get Text    xpath=//h3[contains(@class, "resultado")]
    Should Contain    ${resultado}    Resultado: 50
    Close Browser

Testar Divisao Com Zero
    [Documentation]  
    Open Browser    ${URL}    chrome   
    Input Text    name=num1    10
    Input Text    name=num2    0
    Select From List By Value    name=operation    divide
    Click Button    xpath=//button[text()='Calcular']

    Wait Until Page Contains Element    xpath=//h3[contains(@class, "error")]    timeout=30
    
    ${erro}=    Get Text    xpath=//h3[contains(@class, "error")]

    Should Contain    ${erro}    Erro: Divisão por zero não é permitida.
    Close Browser


