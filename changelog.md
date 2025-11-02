# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

[//]: # (## Template)

[//]: # ()

[//]: # (### Added)

[//]: # (- item)

[//]: # (### Changed)

[//]: # (- item)

[//]: # (### Fixed)

[//]: # (- item)

[//]: # (### Removed)

[//]: # (- item)

## 02/11/2025

### Added

- Search and filter functionality for blueprints
- Toggle button in admin blueprints list to switch visibility status
- Like functionality for blueprints
- Minimum 2 likes before creating blueprints

### Changed

- Show blueprints request now in admin blueprint list

## Removed

- Show checkbox from blueprint create/edit forms

## 30/10/2025

### Added

- Deployer to requirements

## 29/10/2025

### Added

- Admin views for users, blueprints, and categories

### Changed

- Routes to include admin views

## 28/10/2025

### Added

- Admin middleware
- Admin controllers for users, blueprints, and categories
- Admin routes

### Changed

- Update routes to include admin routes
- Navbar links for admin panel
- added protected fillable to category model

### Removed

- Remove tags table

## 27/10/2025

### Changed

- User roles from string to int
- Update BlueprintController and views to require URL

### Removed

- Blueprint code field

## 23/10/2025

### Added

- faq on about page
- How-to view

### Changed

- Headers on all pages except home page

## 21/10/2025

### Added

- Roles to user model
- Roles to database migration
- isUser and isAdmin functions to User model
- Material Design Icons package
- Database seeder for users, categories and blueprints

### Changed

- Categories migration to add icon field
- Blueprint migration to add url field
- BlueprintController to handle url field
- Blueprint views to display url field

## 19/10/2025

### Added

- Content on about page
- Contact page view

### Changed

- layout structure to use navigation.blade.php
- navigation bar structure

### Removed

- navbar.blade.php

## 18/10/2025

### Changed

- Changed favicon

## 15/10/2025

### Added

- Create view for blueprints
- Edit view for blueprints
- Store functionality for blueprints
- Delete functionality for blueprints
- Update functionality for blueprints management
- Validation in BlueprintController
- Category table, model, migration and controller
- Relationship between blueprints and categories
- Textarea component

### Changed

- Blueprints table schema (timestamps, categories added)
- Show view for blueprints

## 14/10/2025

### Added

- Footer
- Blueprint model
- Migrations for blueprints tags, and likes

## 13/10/2025

### Added

- Navigation bar

### Changed

- rename about-us view to about
- update routing
- update views
- updated name in .env.example

## 08/10/2025

### Added

- Setup project structure and initial files.
- Added breeze for authentication.
- Added basic routing and controller setup.
