#!/usr/bin/env bash
# Script to configure our application for the environment prepared by previous script.
# This is the bridge between machine-specific configuration and machine-independent configuration.

# Separately specified settings for database
# NOTE that the password was already specified before in previous bootstrap script!
DB_USER=root
DB_PASS=mysqlroot
DB_NAME=crmapp

# Creating database
# NOTE the absence of the space between `-p` flag and the password!
mysql -u ${DB_USER} -p${DB_PASS} -e "create database if not exists ${DB_NAME} default character set utf8 default collate utf8_unicode_ci";
mysql -u ${DB_USER} -p${DB_PASS} -e "create database if not exists ${DB_NAME}_test default character set utf8 default collate utf8_unicode_ci";

# Copy the prepared Apache config from codebase to the Apache config folder.
cp -f /vagrant/bootstrap/frontend.apache2.conf /etc/apache2/sites-enabled/
# Restart Apache so new virtual host will be published.
/etc/init.d/apache2 restart