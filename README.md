CRUD básico desenvolvido em php utilizando banco de dados local postgresql.

Para testar é necessário a criação de um banco de dados e a alteração do arquivo database.php. Foi utilizado xampp para rodar um localhost.
Após a criação do banco de dados no pgadmin4 foi realizado a criação de uma tabela Pessoas e a alteração no arquivo php.ini dentro de C:/xampp, as duas linhas alteradas foram:

;extension=pdo_pgsql
;extension=pgsql

para 

extension=pdo_pgsql
extension=pgsql

Isso ativa a extensão PDO (PHP Data Objects) para PostgreSQL que foi utilizada para estabelecer conexao do php ao postgre.
