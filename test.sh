#!/bin/bash

# Define the output file
OUTPUT_FILE="artisan_outputs.txt"

# List of Artisan commands
COMMANDS=(
    "make:cast"
    "make:channel"
    "make:command"
    "make:component"
    "make:controller"
    "make:event"
    "make:exception"
    "make:factory"
    "make:job"
    "make:listener"
    "make:mail"
    "make:middleware"
    "make:migration"
    "make:model"
    "make:notification"
    "make:observer"
    "make:policy"
    "make:provider"
    "make:request"
    "make:resource"
    "make:rule"
    "make:scope"
    "make:seeder"
    "make:test"
    "make:view"
    "make:volt"
)

# Clear the output file
> $OUTPUT_FILE

# Loop through each command and execute it with the -h option
for cmd in "${COMMANDS[@]}"; do
    echo "Collecting output for: php artisan $cmd -h" >> $OUTPUT_FILE
    php artisan $cmd -h >> $OUTPUT_FILE
    echo -e "\n--------------------------------------------------\n" >> $OUTPUT_FILE
done

echo "All outputs have been collected in $OUTPUT_FILE."
