#!/bin/bash

# Move to the project directory
cd "$(dirname "$0")"

# Pull the latest changes from the repository
git pull origin main

# Install/update dependencies
composer install --no-dev --optimize-autoloader

# Clear the cache
php bin/console cache:clear --env=prod

# Run database migrations (if needed)
php bin/console doctrine:migrations:migrate --no-interaction

# Restart services (e.g., web server, queues, etc.)
sudo systemctl restart nginx

# Optionally, perform other deployment tasks such as building assets, updating configuration, etc.

# Display a success message
echo "Deployment completed successfully"
