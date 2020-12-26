#!/usr/bin/env bash
# ^ This shebang is mandatory so we'll really use Bash. We need it in debconf-set-selections invocation below.
#
# This setup script is specifically for Ubuntu 12.04 "Precise" distro.
# It will install the PHP 5.4-based LAMP stack with default versions of components.
# Apache 2.x
# MySql 5.x
#
# Note that this script has to be run from root account, as it requires ability
# to install packages, restart system services and modify configuration files

# Separately specified settings for database
# NOTE that this password is specified again in next bootstrap script!
DB_PASS=mysqlroot

# We are going to install packages here
apt-get update

# We want PHP 5.4 on Ubuntu 12.04, adding PPA for it
# See http://askubuntu.com/q/109404
apt-get install -y python-software-properties
add-apt-repository ppa:ondrej/php5

# Updating repo index after adding PPA
sudo apt-get update

# Preparing answers for automatic install
# See http://stackoverflow.com/q/7739645/647199
debconf-set-selections <<< "mysql-server mysql-server/root_password password ${DB_PASS}"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password ${DB_PASS}"

# Getting updated list of packages
apt-get update

# Installing software
# `apache php5` is obvious
# `vim mysql-client` is for ease of using the VM through `vagrant ssh`
# `php5-curl` is a requirement for Goutte library required by Mink Selenium driver
# `git` is required because we will use Composer from inside Vagrant VM
apt-get install -y apache2 php5 vim mysql-client mysql-server php5-mysqlnd git php5-curl php5-mcrypt

# Installing required software for running acceptance tests via Selenium directly on the deploy target.
# This is not a good idea overall, but this way you will be able to run
# both acceptance and functional tests from the same console.
apt-get install -y openjdk-7-jre-headless xvfb firefox

# Has to remove default virtual host listening on 80 port (HAS to be done before restarting Apache)
rm -rf /etc/apache2/sites-enabled/*

# Enabling mod_rewrite on server
## `cd` is done just for symlink to have same format as others inside `mods-enabled/`
cd /etc/apache2/mods-enabled/
ln -s ../mods-available/rewrite.load rewrite.load

# Make the apache load under our user account.
sed -ri 's/^(export APACHE_RUN_USER=)(.*)$/\1vagrant/' /etc/apache2/envvars
sed -ri 's/^(export APACHE_RUN_GROUP=)(.*)$/\1vagrant/' /etc/apache2/envvars

# Shut up Apache spouting nonsense about ServerName not defined.
touch /etc/apache2/conf-available/globalname.conf
echo "ServerName vagrant" > /etc/apache2/conf-available/globalname.conf
cd /etc/apache2/conf-enabled
ln -s ../conf-available/globalname.conf globalname.conf

