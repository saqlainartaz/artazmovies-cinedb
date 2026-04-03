# CineDB

A movie discovery and watchlist application built with Laravel 12, powered by the [TMDB API](https://www.themoviedb.org/documentation/api). Users can browse popular movies, view details, and save movies to a personal watchlist.

## Features

- **Movie Browsing** - Paginated list of movies sorted by popularity via the TMDB API
- **Movie Details** - View movie info including cast and credits
- **Watchlist** - Authenticated users can save movies to a personal watchlist
- **User Authentication** - Registration, login, and profile management via Laravel Breeze
- **Responsive UI** - Built with Tailwind CSS

## Tech Stack

- **Backend:** Laravel 12, PHP 8.2+
- **Frontend:** Blade templates, Tailwind CSS, Vite
- **API:** The Movie Database (TMDB) API
- **HTTP Client:** Guzzle
- **Database:** SQLite (default), configurable to MySQL/PostgreSQL

## Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- A TMDB API token (free at https://www.themoviedb.org/settings/api)

## Installation

### 1. Clone the repository

```bash
cd cineDB
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Set up environment

```bash
cp .env.example .env
php artisan key:generate
```

Add your TMDB API token to the `.env` file:

```env
TMDB_TOKEN=your_tmdb_api_token_here
```

### 4. Run migrations

```bash
php artisan migrate
```

### 5. Build assets and start

```bash
npm run build
php artisan serve
```

Or run everything at once with:

```bash
composer run dev
```

Visit `http://localhost:8000` in your browser.

## Project Structure

| Path | Description |
|------|-------------|
| `app/Http/Controllers/MovieController.php` | Fetches movies from TMDB API |
| `app/Http/Controllers/WatchlistController.php` | Manages user watchlists |
| `app/Models/Watchlist.php` | Watchlist model |
| `resources/views/movies.blade.php` | Movie listing page |
| `resources/views/movie.blade.php` | Single movie detail page |
| `resources/views/watchlist.blade.php` | User's watchlist page |
| `routes/web.php` | Application routes |

## API Endpoints

| Method | Route | Description |
|--------|-------|-------------|
| `GET` | `/movies/{page?}` | Browse movies (paginated) |
| `GET` | `/movie/{id}` | Show movie details |
| `GET` | `/watchlist` | View user's watchlist (auth required) |
| `POST` | `/watchlist/add` | Add movie to watchlist (auth required) |
| `GET` | `/profile` | Edit profile (auth required) |

## License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
