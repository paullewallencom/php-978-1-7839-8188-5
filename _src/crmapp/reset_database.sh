#!/bin/bash
# This script will correctly make the data dump for Codeception tests using Db module.
# We need an empty schema with migration and users information filled in,
# because our "acceptance" and "api" suites are using the same database as the working application.

# DO NOT USE THIS SCRIPT ON PRODUCTION!!

# Drop the production database
mysql -u root -pmysqlroot -e "drop database if exists crmapp; create database crmapp default character set utf8 default collate utf8_unicode_ci";

# Initialize the RBAC setup in empty database
./yii migrate --interactive=0 --migrationPath='@yii/rbac/migrations'

# Run all our own migrations
./yii migrate --interactive=0

# Make the SQL data dump for Codeception
mysqldump -u root -pmysqlroot crmapp > tests/_data/dump.sql
