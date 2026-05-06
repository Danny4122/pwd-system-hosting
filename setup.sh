#!/bin/bash

echo "Setting up PWD Application System..."

# Wait for PostgreSQL to be ready
echo "Waiting for database..."
sleep 10

# Initialize database
echo "Initializing database..."
psql -h localhost -U postgres -d pdao_db -f docker/init/01-schema.sql
psql -h localhost -U postgres -d pdao_db -f docker/init/02-seed-data.sql

echo "Setup complete! Your app should be running at the Replit URL."