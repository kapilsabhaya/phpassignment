# Project Setup with Docker

This project is built using PHP 8.2, PHPUnit for testing, and PHPStan for static code analysis. The project is configured to run inside a Docker container.

## Prerequisites

Before you begin, ensure you have the following installed on your system:

- [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Getting Started

Follow the steps below to set up the project on your local machine.

### 1. Clone the repository


git clone git@github.com:kapilsabhaya/phpassignment.git
cd your-repo-name

### 2. Build the Docker containers
Run the following command to build the Docker containers defined in docker-compose.yml:
- docker-compose build


### 3. Run the application
Running PHPStan
PHPStan is used to perform static analysis on your code. 
To run PHPStan inside the container: docker-compose run phpstan

Running PHPUnit Tests
To run PHPUnit tests inside the container: docker-compose run phpunit
