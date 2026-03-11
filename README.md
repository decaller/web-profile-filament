# 🏫 School Profile - Filament PHP

A sophisticated and modern school profile management system built with **Laravel 12**, **Filament PHP v3**, and **DaisyUI**. This project provides a robust administrative interface for managing every aspect of a school's digital presence, from dynamic page layouts to SEO and Google Analytics.

---

## ✨ Features

### 🛠 Administrative Dashboard (Filament PHP)
*   **Intuitive UI**: A clean, modern admin interface built on Filament v3.
*   **Comprehensive CMS**: Manage all site content including:
    *   **Pages**: Create dynamic pages with a modular block builder.
    *   **Posts & News**: Full-featured blog management.
    *   **Activities**: Track and display school events and activities.
    *   **Publications**: Manage school documents, reports, and digital publications.
    *   **Testimonials**: Curate feedback from students, parents, and alumni.
*   **Role-Based Access**: Secure authentication and user management.
*   **Admin Guide**: Built-in widget providing quick tips for administrators.
*   **Notifications**: Real-time notification system for system events.

### 🏗 Dynamic Page Builder
Build complex, responsive page layouts without writing code using our pre-built blocks:
*   **Hero Sections**: Stunning first impressions with images and CTAs.
*   **Contextual Blocks**: Challenge/Pain Points and Vision/Solution layouts.
*   **Programs & Features**: Grid-based displays with Heroicon support.
*   **Dynamic Lists**: Automatically pull latest Posts, Activities, or Publications into any page.
*   **FAQ & Testimonials**: Static or dynamic feedback sections.
*   **Call to Action (CTA)**: High-conversion segments for registration or contact.

### ⚙️ Site Management
*   **Menu Builder**: Drag-and-drop management for Header and Footer navigation menus.
*   **General Settings**: Control site branding, contact info, and layout defaults.
*   **SEO Suite**: Integrated SEO meta management (titles, descriptions, social images) for every page and post.
*   **Google Analytics**: Dedicated settings panel to configure GA4 tracking with real-time dashboard widgets.

### 🎨 Frontend Excellence
*   **DaisyUI & Tailwind CSS**: Professional, utility-first design system.
*   **Theme Switcher**: Supported themes including `Winter` (light) and `Dim` (dark).
*   **Responsive Design**: Fully optimized for mobile, tablet, and desktop views.

---

## 🛠 Tech Stack

| Layer | Technology |
| :--- | :--- |
| **Framework** | [Laravel 12](https://laravel.com/) |
| **Admin Panel** | [Filament PHP v3](https://filamentphp.com/) |
| **UI Components** | [DaisyUI](https://daisyui.com/) & [Tailwind CSS](https://tailwindcss.com/) |
| **Icons** | [Heroicons](https://heroicons.com/) |
| **SEO** | [Laravel Filament SEO](https://github.com/ralphjsmit/laravel-filament-seo) |
| **Analytics** | [Filament Google Analytics](https://github.com/bezhansalleh/filament-google-analytics) |
| **Database** | SQLite (Default) |

---

## 🚀 Getting Started

### 1. Prerequisites
*   **PHP 8.2+**
*   **Composer**
*   **Node.js & NPM**
*   **SQLite** (or your preferred database)

### 2. Installation

1.  **Clone the repository**:
    ```bash
    git clone <repository-url>
    cd smp-filament
    ```

2.  **Install dependencies**:
    ```bash
    composer install
    npm install
    ```

3.  **Configure Environment**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Initialize Database**:
    ```bash
    # This creates the database, runs migrations, and seeds sample data
    php artisan migrate --seed
    ```

5.  **Setup Storage**:
    ```bash
    php artisan storage:link
    ```

### 3. Running Locally

Start the development servers in separate terminals:

```bash
# Terminal 1: PHP Server
php artisan serve

# Terminal 2: Vite (CSS/JS)
npm run dev
```

Visit the application at: `http://127.0.0.1:8000`
Access the Admin Panel: `http://127.0.0.1:8000/admin`

---

## 🔐 Default Admin Access
If you ran the seeder, use these credentials:
*   **Email**: `admin@admin.com`
*   **Password**: `password`

---

## 📸 Screenshots
*(Coming soon or add your images here)*

---

Developed with ❤️ for educational excellence.
