<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Run the app (localhost)

### Step 1: Install dependencies
```bash
composer install
npm install
```

### Step 2: Troubleshooting - vendor/autoload.php not found
If you encounter this error:
```
PHP Warning: require(/home/.../vendor/autoload.php): Failed to open stream: No such file or directory
PHP Fatal error: Failed opening required 'vendor/autoload.php'
```

This means Composer dependencies have not been installed. Run:
```bash
composer install
```

If the issue persists:
- Ensure `composer.json` exists and is valid
- Run `composer dump-autoload` to regenerate the autoloader
- Delete `composer.lock` and run `composer install` again
- Verify that the `vendor/` directory is created

---

## Troubleshooting - Database Connection (Arch Linux)

If you encounter:
```
SQLSTATE[HY000] [2002] Connection refused
```

### Step 1: Check MariaDB Service Status
```bash
systemctl status mariadb
```

**If MariaDB is not running (failed/active: inactive):**
```bash
sudo systemctl start mariadb
```

**If MariaDB won't start and shows errors like:**
```
Can't open and lock privilege tables: Table 'mysql.db' doesn't exist
```
The database needs to be re-initialized:

```bash
# 1. Stop MariaDB
sudo systemctl stop mariadb

# 2. Backup old data (if needed)
sudo mv /var/lib/mysql /var/lib/mysql.bak

# 3. Re-initialize MariaDB
sudo mariadb-install-db --user=mysql --basedir=/usr --datadir=/var/lib/mysql

# 4. Start MariaDB
sudo systemctl start mariadb
```

### Step 2: Configure Database Access

Connect to MariaDB and set up the database:
```bash
sudo mariadb
```

Inside MariaDB shell:
```sql
-- Create your database (match .env DB_DATABASE)
CREATE DATABASE IF NOT EXISTS db_toko;

-- Allow root connections via TCP/IP (for 127.0.0.1 connections)
CREATE USER IF NOT EXISTS 'root'@'127.0.0.1' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'127.0.0.1' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```

Exit with `EXIT;`

### Step 3: Verify .env Configuration

Check your `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1      # IMPORTANT: Use 127.0.0.1, NOT localhost
DB_PORT=3306
DB_DATABASE=db_toko
DB_USERNAME=root
DB_PASSWORD=            # Leave empty if no password set
```

### Step 4: Clear Config Cache
```bash
php artisan config:clear
```

### Step 5: Run Migrations
```bash
php artisan migrate
```

### Step 6: Create Custom Tables (if using Product.php)

If you're using the custom `classes/Product.php` with `mysqli`, create the required tables:
```bash
sudo mariadb db_toko -e "
CREATE TABLE IF NOT EXISTS kategori (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    id_kategori INT NOT NULL,
    nama_produk VARCHAR(255) NOT NULL,
    harga DECIMAL(10,2) NOT NULL,
    deskripsi TEXT,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori) ON DELETE CASCADE
);
"
```

### Step 7: Restart the Server
```bash
php artisan serve --host 127.0.0.1 --port 8000
```

---

### Quick Fix Checklist

| Check | Command |
|-------|---------|
| MariaDB running? | `systemctl status mariadb` |
| Can connect? | `sudo mariadb -e "SHOW DATABASES;"` |
| Database exists? | `sudo mariadb -e "SHOW DATABASES LIKE 'db_toko';"` |
| Tables exist? | `sudo mariadb db_toko -e "SHOW TABLES;"` |
| Clear config cache? | `php artisan config:clear` |

### Step 3: Configure database
1. Copy `.env.example` to `.env`:
   ```bash
   cp .env.example .env
   ```
2. Generate Laravel application key:
   ```bash
   php artisan key:generate
   ```
3. Edit `.env` and set your `DB_*` variables (DB_DATABASE, DB_USERNAME, DB_PASSWORD).
4. Ensure PHP extensions are installed:
   - `mysqli` or `pdo_mysql` must be enabled
   - Run: `php -m | grep -i mysql` to verify
   - On Debian/Ubuntu: `apt-get install php-mysqli` or `apt-get install php-pdo-mysql`
   - Or enable extension in `php.ini`: `extension=mysqli`
   - If getting "could not find driver", ensure `pdo_mysql.so` is in `extension_dir` and uncomment `extension=pdo_mysql` in `php.ini`
5. Run migrations (and seed if needed):
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

### Step 4: Start the server
```bash
php artisan serve --host 127.0.0.1 --port 8000
```

Server will be running on: http://127.0.0.1:8000

### Step 5: Open in browser
- Home: http://127.0.0.1:8000/
- Seller Center: http://127.0.0.1:8000/admin
---

## Add and remove product (Seller Center)

### Where is the page?
- **Home / product list**: http://127.0.0.1:8000/
- **Seller Center (admin)**: http://127.0.0.1:8000/admin

### Add product
1. Open **Seller Center**: http://127.0.0.1:8000/admin
2. Click **Tambah Produk**.
3. Fill in the form (Nama Produk, Kategori, Harga, Deskripsi) and click **Simpan**.

### Remove product
1. Open **Seller Center**: http://127.0.0.1:8000/admin
2. Click **Hapus** on the product row.
3. Confirm the popup.

> Backend routes used:
- Add: `POST /tambah`
- Update: `POST /edit/{id}`
- Delete: `GET /delete/{id}`



## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:


- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
