#!/bin/bash
set -e

# Install Composer if not available
if ! command -v composer &> /dev/null; then
    echo "Installing Composer..."
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php composer-setup.php --quiet
    rm composer-setup.php
    mv composer.phar /usr/local/bin/composer
fi

echo "Running composer install..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "Running npm build..."
npm run build

echo "Build complete."
