# 1 Instalação
    . Baixar WampServer
    . Incluir pasta WWW
    . Hospedar este projeto dentro desta pasta.

# 2 Projeto
    . Realizar comando Composer Update
    . Instalar RobotFramework e PHP Unity.

# 3 Comandos de Testes para execução

    . SONAR
        . Acessar localhost:9000
        . Configurar arquivo sonar-project.properties na raiz do projeto, se não conter, criar.
        EXEMPLO:
            sonar.projectKey=calculadora
            sonar.projectName=Calculadora
            sonar.projectVersion=1.0
            sonar.sources=src,tests
            sonar.host.url=http://localhost:9000
            sonar.login=sqa_edb5ae4ac6093fb75529155d967a6463d75213b3
            sonar.phpunit.reportsPath=tests/logs
            sonar.coverage.exclusions=**/vendor/**
            sonar.php.coverage.reportPaths=coverage.xml
            sonar.inclusions=**/calculadora.php  
            #Sonar.inclusions faz a validação somente dos arquivos que eu passar;
        
    Comando de execução: dentro da pasta do projeto, executar **sonar-scanner**.

    ROBOT FRAMEWORK:
        . Rodar comando: robot robot-tests/calculadora_tests.robot
    
    PHP UNITY:
        . Rodar comando: vendor/bin/phpunit --coverage-html coverage_report tests/ 

    SELENIUM WEBDRIVER:
        . Rodar comando: ./vendor/bin/phpunit tests/CalculadoraWebTest.php 

# 4 Instalação SONAR na máquina
    Seguir vídeo: https://www.youtube.com/watch?v=xs9fKiJ1Ts0