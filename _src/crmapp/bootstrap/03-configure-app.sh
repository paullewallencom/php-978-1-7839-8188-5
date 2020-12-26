#!/bin/bash

# Go to the root project folder
cd /vagrant

# Install all prerequisites, including Yii
php composer.phar install --prefer-dist

# Copy the prepared config snippets to the configuration tree
cp bootstrap/local.php config/overrides/

# Copy the prepared config snippet for test database connection to the configuration tree
cp bootstrap/test.php config/

# Initialize the RBAC tables
./yii migrate --migrationPath='@yii/rbac/migrations' --interactive=0

# Initialize the database overall
./yii migrate --interactive=0
