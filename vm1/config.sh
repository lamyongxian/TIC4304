sudo apt update
sudo apt -y install apache2 php php-mysql libapache2-mod-php mysql-client
sudo service apache2 restart

#mysql -u lsuser -h 10.0.2.4 -p 12345678

sudo sed -i 's/PasswordAuthentication no/PasswordAuthentication yes/g' /etc/ssh/sshd_config
sudo bash -c 'echo PasswordAuthentication yes >> /etc/ssh/sshd_config'
sudo service ssh restart

#cd /var/www/html/