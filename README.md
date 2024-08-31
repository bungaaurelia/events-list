# Belajar Mandiri



## Overview

This project is an Event Management System built with Laravel. It allows users to manage events, including creating, updating, and deleting events. The system also supports managing event types and organizers, with features for publishing and unpublishing events.

## Features

- Event Management: Create, read, update, and delete events.
- Event Types: Manage event types.
- Organizers: Manage event organizers.
- Publish/Unpublish Events: Toggle events between published and unpublished states.

## Installation

### Prerequisites

- PHP 8.0 or higher
- Composer
- MySQL or other supported database

### Steps

- Clone the Repository

```
git clone <repository-url>
cd <project-directory>
```

- Install Dependencies

```
composer install
```

- Set Up Environment
Copy .env.example to .env and configure your environment settings, including the database connection:

```
cp .env.example .env
```

Update .env with your database credentials and other configurations.

- Generate Application Key
```
php artisan key:generate
```

- Run Migrations

```
php artisan migrate
```

- Seed the Database (if you have seeders)
```
php artisan db:seed
```

- Start the Development Server
```
php artisan serve
```

Your application will be available at http://localhost:8000.

## API Endpoints

### Base URL

For local development, the base URL is http://localhost:8000/api.

### Endpoints

#### Events

- Get All Events

```
GET /api/events
```

- Get Event by ID

```
GET /api/events/{id}
```

- Create Event

```
POST /api/events
```

##### Request Body:

```
{
  "event_name": "Event Name",
  "event_date": "YYYY-MM-DD",
  "event_time": "HH:MM:SS",
  "organizer_id": 1,
  "description": "Event Description",
  "event_type_id": 1,
  "status": "published"
}
```

- Update Event
```
PUT /api/events/{id}
```

##### Request Body:

{
  "event_name": "Updated Event Name",
  "event_date": "YYYY-MM-DD",
  "event_time": "HH:MM:SS",
  "organizer_id": 1,
  "description": "Updated Description",
  "event_type_id": 1,
  "status": "unpublished"
}

- Delete Event

```
DELETE /api/events/{id}
```

- Update Event Status

```
PATCH /api/events/{id}/status
```

##### Request Body:

```
{
  "status": "published" // or "unpublished"
}
```

#### Event Types

- Event Types

```
GET /api/event-types
```

- Create Event Type

```
POST /api/event-types
```

- Update Event Type

```
PUT /api/event-types/{id}
```

- PUT /api/event-types/{id}

```
DELETE /api/event-types/{id}
```

#### Organizers

- Get All Organizers

```
GET /api/organizers
```

- Create Organizer

```
POST /api/organizers
```

- Update Organizer

```
PUT /api/organizers/{id}
```

- Delete Organizer

```
DELETE /api/organizers/{id}
```

### Testing
To run tests, use:

```
php artisan test
```

### Contributing
If you want to contribute to this project, please fork the repository and create a pull request with your changes.

### Contact
For any inquiries or issues, please contact me at annisabungaaurelia99@gmail.com.