

# Szabist Event Landing Website

**Submitted by:** Naveed Asad Ali  
**Program:** BSCS 5D

## Project Overview

The "Szabist Event Landing Website" is a responsive, dynamic website developed using Laravel. Initially, the website was built as a static front-end using HTML, CSS, and Bootstrap to ensure responsiveness across all devices and browsers. The front-end was later integrated into Laravel with Blade templates, routes, and controllers. The final version includes dynamic sections and API endpoints, making the website interactive and scalable.

This project implements a clean and simple website layout with proper alignment of elements, ensuring full responsiveness on all screen sizes (desktop, tablet, and mobile). Cross-browser compatibility is also ensured (Chrome, Firefox, Safari, and Edge).

## Project Features

- **CRUD Implementation**: Complete Create, Read, Update, and Delete functionality for event management.
- **Relationship Implementation**: At least one relationship between models has been implemented (e.g., Event-Participant relationship).
- **AJAX Integration**: AJAX is used for search-bar and dynamic functionality to improve user experience.
- **API Implementation**: APIs are included to expose the event data, allowing interaction with other systems or services.

## Repository Requirements

- The repository contains the complete project with all necessary modules.
- The project includes at least **2 branches** (`api` and `final-project`).
- Proper **database migrations** for all modules in the project.
- Code follows clean, well-commented, and maintainable practices.

## Setup Instructions

### Prerequisites
Before you begin, ensure you have the following installed:
- PHP (preferably 8.0 or higher)
- Composer
- Laravel (via Composer)
- Node.js and npm (for frontend dependencies)

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/szabist-event-landing.git
    ```

2. Navigate to the project directory:
    ```bash
    cd szabist-event-landing
    ```

3. Install PHP dependencies:
    ```bash
    composer install
    ```

4. Install frontend dependencies (if applicable):
    ```bash
    npm install
    ```

5. Set up the environment variables:
    - Copy `.env.example` to `.env`:
    ```bash
    cp .env.example .env
    ```

6. Generate the application key:
    ```bash
    php artisan key:generate
    ```

7. Run database migrations:
    ```bash
    php artisan migrate
    ```

8. (Optional) Seed the database if needed:
    ```bash
    php artisan db:seed
    ```

9. Serve the application:
    ```bash
    php artisan serve
    ```

The application should now be accessible at `http://localhost:8000`.

## Usage Guide

- **Home Page**: Displays a summary of events.
- **Event Details**: View detailed information about each event.
- **Contact Page**: Provides a contact form and other contact details.
- **CRUD Operations**: Admins can create, update, and delete events through the dashboard.
- **Search**: Use the AJAX-powered search bar to filter events by name or description.

## Database Migrations

The project includes migrations for the following models:

- `Event` - For event-related information.
- `Participant` - For storing participant data.
- Relationships between the `Event` and `Participant` models are defined.

Run the migrations with:


php artisan migrate


