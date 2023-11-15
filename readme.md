1- Clone o arquivo para seu repositório
2 - Ajuste as configurações do seu banco de dados em: src/Helper/EntityManagerFactory.php e em src/Infra/EntityManagerCreator
3 - execute o comando vendor\bin\doctrine.bat orm:schema-tool:create para criar as tabelas necessarias no banco de dados
4 - Inicie seu servidor executando o seguinte comando: php -S localhost:8000 -t public