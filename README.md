# DonDong! Marketing Website

Modern marketing website for DonDong! powdered drink brand. Built with Laravel 9, Tailwind CSS, and Alpine.js.

## Features
- **Premium Landing Page**: Mobile-first, responsive, and high-converting design.
- **Custom CMS**: Admin can manage landing page content, products, and global settings/SEO.
- **Brand Assets**: High-resolution tropical-themed assets generated with AI.
- **Security**: Protected admin routes using Laravel Breeze.
- **Database**: Efficient SQLite storage for easy deployment.

## Tech Stack
- Laravel 9.0
- PHP 8.0+
- Tailwind CSS
- Alpine.js
- SQLite

## Setup Instructions
1. **Clone/Download** the repository.
2. **Setup environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. **Database Setup**:
   ```bash
   touch database/database.sqlite
   php artisan migrate --seed
   ```
4. **Link Storage**:
   ```bash
   php artisan storage:link
   ```
5. **Run Dev Server**:
   ```bash
   php artisan serve
   ```
6. **Admin Login**:
   - URL: `/login` (redirects to `/admin/dashboard` on success)
   - Email: `admin@dondong.id`
   - Password: `password`

## Management
All content can be updated via the `/admin` panel:
- **Landing Page**: Edit Hero, Benefits, and Ingredients.
- **Products**: Manage product descriptions and visibility.
- **Settings**: Update WhatsApp numbers, Instagram links, and SEO tags.
