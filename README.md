# docker_laravel_rabbitMQ_mysql

## Introduction - brief description

This project is a Laravel 11.x application using RabbitMQ as a message broker and MySQL as a database. It is built using Docker and Docker Compose and provides a simple way to run these technologies locally.

The application is divided into two parts, the main application and the admin application. The main application is where users can register and upload files. The admin application is where administrators can view the files uploaded by users and remove them if necessary.

The application uses RabbitMQ to handle asynchronous tasks. When a user uploads a file, a message is sent to the RabbitMQ queue. A consumer then processes the message and saves the file to the database. This allows the application to handle many users uploading files simultaneously without overloading the server.

The application also uses Laravel's built-in queue functionality. When a user uploads a file, a job is dispatched to the queue. A worker then processes the job and saves the file to the database.

The application is a starting point for developers to build upon. It includes a Dockerfile and Docker Compose file for easy deployment.

## Pre-requisites

This project requires Docker and Docker Compose to be installed. Please follow the instructions for your operating system to install Docker and Docker Compose:

- [Install Docker on macOS](https://docs.docker.com/docker-for-mac/install/)
- [Install Docker on Windows](https://docs.docker.com/docker-for-windows/install/)
- [Install Docker on Linux](https://docs.docker.com/engine/install/)
- [Install Docker Compose](https://docs.docker.com/compose/install/)
- [Install PHP and Composer on Ubuntu](https://www.digitalocean.com/community/tutorials/how-to-install-laravel-with-an-nginx-web-server-on-ubuntu-18-04)
- [Install PHP and Composer on macOS](https://getcomposer.org/doc/00-intro.md)
