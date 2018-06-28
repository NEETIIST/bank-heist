# beti-csrf-example

https://beti-heist.herokuapp.com

Módulo de segurança. Demonstração de uma ataque do tipo "cross site request forgery" e vantagens do HTTPS em relação ao HTTP.

## Getting Started

### Prerequisites

- Install PHP (with pdo-pgsql)
- Install Postgres

- Create a database on Postgres
- Import dump.sql to create database structure with some demo data

- In dbConnect.php change the connection string to your localhost settings


## Usage

- Create two accounts
- Transfer money between them for test purposes

- Login with one of them (user1)

- Open the following link with user2* -> https://beti-csrf.herokuapp.com/transferMoney.php?user=user2&value=10&code=GI

- The value you specified will be transfered from user1 to user2

- To reset DB open -> https://beti-csrf.herokuapp.com/resetDB.php

- *code is a vigenere cipher of the amount to be transfered, this amount needs to be previously converted to the corresponding string of the alphabet. Ex. A=0, B=1, C=2, etc.; they key of the cipher is the logfed username

## Authors

* **Filipe Fernandes** - *Backend* - [filiperfernandes](https://github.com/filiperfernandes)
* **Tomás Jacob** - *Frontend* - [TJacoob](https://github.com/TJacoob)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Made with :heart: for NEETI-IST



