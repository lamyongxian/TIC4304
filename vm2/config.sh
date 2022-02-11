sudo apt update
sudo apt -y install mysql-server

sudo mysql -u root < /vagrant/vm2/db.sql

#sudo bash -c 'echo Bind-address: 127.0.0.1 >> /etc/mysql/mysql.conf.d/mysqld.cnf'

sudo service mysql restart

mysql -u lsuser -p12345678 -D loginsystem < /vagrant/vm2/db2.sql
status;