# as-capacita-phalcon-mvc

1. [Phalcon Framework](https://phalconphp.com/pt/)
2. [Phalcon Github](https://github.com/phalcon/cphalcon/)

### Phalcon MVC
Estrutura do projeto
```
as-capacita-phalcon-mvc/
  app/
    configs/
    controllers/
    models/
    views/
  public/
    css/
    img/
    js/
```

Variáveis de ambiente

```
username = "user"
password = "passwd"
dbname   = "as-capacita-phalcon-mvc"
```

Banco de Dados
```sql
-- CREATE DATABASE "as-capacita-phalcon-mvc" ---------------
CREATE DATABASE IF NOT EXISTS `as-capacita-phalcon-mvc` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `as-capacita-phalcon-mvc`;
-- ---------------------------------------------------------


-- CREATE TABLE "users" ------------------------------------
CREATE TABLE `users` (
    `id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
    `name` VarChar( 70 ) NOT NULL,
    `email` VarChar( 70 ) NOT NULL,
    PRIMARY KEY ( `id` ) )
ENGINE = InnoDB;
-- ---------------------------------------------------------
```
