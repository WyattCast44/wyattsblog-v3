# Wyatt Blogs - Version 3

The source code for my personal website

## Local Installation

Clone the repo

```bash
https://github.com/WyattCast44/wyattsblog-v3
```

Copy and configure `.env`

```bash
cp .env.example .env
```

Install PHP deps

```bash
composer install
```

Generate `APP_KEY`

```bash
php artisan key:generate
```

Install FE deps

```bash
yarn install
```

Build FE deps (optional)

```bash
yarn dev
```

## Testing

To run the application test suite, use the artisan test runner.

```bash
php artisan test --parallel
```

## Git 

The default branch is `main`. As a small project (in terms of people actively working on it), all changes should be commited directly to `main`. Feature branches are fine, but strive to work from `main`.