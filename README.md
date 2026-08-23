# Online Bookstore & Digital Library

An online bookstore and digital library platform inspired by services such as Fidibo.

This project is being developed as a modular, scalable, and maintainable backend application. The main goal is not only to implement the required features, but also to maintain a clean architecture and clear boundaries between different business domains.

> **Status:** Work in Progress

---

## About the Project

This project is an online bookstore and digital content platform where users can browse, search, and purchase different types of books and digital content.

The platform is inspired by applications such as Fidibo and is designed to support different types of book content, including:

- E-books
- Audiobooks
- Textbooks
- Magazines
- Podcasts
- Other digital content

The project is currently under active development and new features are being added continuously.

---

## Architecture

One of the main goals of this project is to keep the application as modular as possible.

The application is divided into separate modules based on business domains. Each module is responsible for its own business logic and should have minimal knowledge about the internal implementation of other modules.

For example:

- Authentication
- Catalog
- Backoffice
- Orders
- Payments
- Users

The exact module structure may evolve as the project grows.

---

## Modular Design

The project follows a modular architecture rather than putting all business logic into a single application layer.

Each module is designed to contain its own:

- Domain logic
- Contracts / Interfaces
- Services
- Models
- Requests
- Resources
- Controllers
- Infrastructure-related implementations

The goal is to keep modules loosely coupled and make them easier to maintain, test, and eventually extract into independent services if needed.

---

## Communication Between Modules

A major design principle of this project is avoiding direct coupling between domains.

When one module needs functionality from another module, the communication should preferably happen through a contract/interface rather than directly depending on the implementation.

For example:

Backoffice
    |
    | CategoryInterface
    ↓
Catalog
    |
    ↓
CategoryService

---

## Domain Boundaries

Each business domain is treated as an independent responsibility.

For example, the Catalog domain is responsible for concepts such as:

- Books
- Book editions/items
- Categories
- Authors
- Publishers
- Content formats

The Backoffice module is responsible for administrative operations and does not own the Catalog domain itself.
Instead, Backoffice communicates with Catalog through defined contracts.
This separation makes it possible to change the way a domain is implemented without forcing other modules to depend on its internal details

---

## Authentication

Authentication is implemented as a separate module.

Other modules should not directly depend on the internal implementation of the Authentication module.

For example, authenticated user information can be accessed through Laravel's authentication layer:

---

## Technology Stack

The project is primarily built with:

PHP
Laravel
MySQL
Redis
Docker
OpenAPI / Swagger

Additional technologies and services may be introduced as the project evolves.

---

## Project Goals

The main goals of this project are:

Build a real-world online bookstore platform
Practice modular architecture
Maintain clear domain boundaries
Reduce coupling between modules
Use interfaces and dependency injection for communication
Apply clean and maintainable coding practices
Build a scalable foundation for future development
Keep the architecture flexible enough for future microservice migration

---

## Future Direction

The project currently follows a Modular Monolith approach.

The architecture is intentionally designed with future microservice extraction in mind. If the project grows and business requirements justify it, individual domains can potentially be extracted into independent services.

                    Modular Monolith
                           |
        +------------------+------------------+
        |                  |                  |
        v                  v                  v
 Authentication         Catalog          Backoffice
        |                  |                  |
        +------------------+------------------+
                           |
                    Shared Contracts