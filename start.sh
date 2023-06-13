#!/bin/bash

php artisan migrate:fresh
exec apache2-foreground
