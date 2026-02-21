# Idea Tracker

A personal idea management app built by following the **[Laravel From Scratch (2026 Edition)](https://laracasts.com/series/laravel-from-scratch-2026)** series on [Laracasts](https://laracasts.com), taught by [Jeffrey Way](https://laracasts.com/authors/jeffrey-way).

The series walks through building a real Laravel application from the ground up — authentication, Eloquent models, Blade components, file uploads, authorization, browser testing, and more — using the latest versions of the Laravel ecosystem.

---

## What It Does

- Submit and manage personal ideas with a title, description, featured image, and links
- Track actionable steps toward completing each idea
- Filter ideas by status (Pending, In Progress, Approved, Denied)
- Upload and remove featured images stored in Laravel's filesystem
- Edit your profile (name, email, password) with an email-change notification
- Full authentication: register, log in, log out

---

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 12 |
| Language | PHP 8.3+ |
| Database | SQLite |
| Frontend | Blade, Tailwind CSS v4, Alpine.js |
| Testing | Pest v4 (unit, feature, browser) |
| Environment | Laravel Sail (Docker) |

---

## Getting Started

**1. Clone and install dependencies**

```bash
git clone <repo-url> idea
cd idea
composer install
```

**2. Copy the environment file and generate a key**

```bash
cp .env.example .env
vendor/bin/sail artisan key:generate
```

**3. Start Sail**

```bash
vendor/bin/sail up -d
```

**4. Run migrations**

```bash
vendor/bin/sail artisan migrate
```

**5. Build frontend assets**

```bash
vendor/bin/sail npm run build
```

Visit the app at [http://localhost](http://localhost).

---

## Running Tests

```bash
vendor/bin/sail artisan test --compact
```

---

## About the Series

> **Laravel From Scratch (2026 Edition)** is a free Laracasts series by Jeffrey Way that teaches you how to build a complete Laravel application from scratch. It covers routing, Eloquent, Blade, authentication, authorization, file uploads, queues, notifications, and testing.
>
> [Watch it on Laracasts](https://laracasts.com/series/laravel-from-scratch-2026)
