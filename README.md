# School Profile Project (Filament PHP)

A modern school profile website built with Laravel, Filament PHP, and DaisyUI.

## 🚀 Local Installation Guide

### 1. Prerequisites (PHP & Tools)

Before installing the project, you need to have **PHP 8.2+**, **Composer**, and **Node.js** installed on your system.

#### 🐧 Linux (Ubuntu/Debian)
```bash
# Update packages
sudo apt update

# Install PHP and common extensions
sudo apt install php8.2 php8.2-curl php8.2-xml php8.2-zip php8.2-mbstring php8.2-gd php8.2-sqlite3 php8.2-intl

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Node.js (via NodeSource or NVM recommended)
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs
```

#### 🪟 Windows
1. **PHP**: The easiest way is to install **[XAMPP](https://www.apachefriends.org/)** or **[Herd for Windows](https://herd.laravel.com/windows)** (Recommended).
   - If using Herd, everything (PHP, Composer, Nginx) is handled for you automatically.
2. **Composer**: Download and run the **[Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe)**.
3. **Node.js**: Download the installer from **[nodejs.org](https://nodejs.org/)**.

---

### 2. Project Setup

Once the prerequisites are ready, follow these steps:

1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   cd smp-filament
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Install Frontend dependencies**:
   ```bash
   npm install
   ```

4. **Prepare Environment File**:
   - Copy `.env.example` to `.env`.
   - Update database settings if necessary (default uses SQLite).
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Run Migrations & Seed**:
   ```bash
   php artisan migrate --seed
   ```

6. **Link Storage**:
   ```bash
   php artisan storage:link
   ```

---

### 3. Running the Project

Open two terminal windows/tabs:

**Terminal 1 (PHP Server):**
```bash
php artisan serve
```

**Terminal 2 (Assets Compilation/Vite):**
```bash
npm run dev
```

Visit the site at `http://127.0.0.1:8000`.
Access the Admin Panel at `http://127.0.0.1:8000/admin`.

## 🛠 Features
- **Filament Admin Panel**: Easy management of pages and settings.
- **Dynamic Page Builder**: Create layouts using custom components.
- **Theme Switcher**: Supported by DaisyUI (Winter/Dim themes).
- **Menu Builder**: Manage header and footer navigation menus.
