sudo apt update
sudo apt install mysql-server

sudo mysql -u root

CREATE DATABASE loginsystem;
USE loginsystem;
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE USER 'lsuser'@'%' IDENTIFIED BY '12345678';
GRANT ALL PRIVILEGES ON loginsystem.* TO 'lsuser'@'%';
FLUSH PRIVILEGES;
QUIT

sudo bash -c 'echo Bind-address: 127.0.0.1 >> /etc/mysql/mysql.conf.d/mysqld.cnf'

sudo service mysql restart

mysql -u lsuser -p 12345678
status;

USE loginsystem;
SHOW TABLES;
QUIT
