# Field Service Management System

A Laravel-based web application for managing field service technicians, scheduling, site visits, and work orders.

---

## Overview

This system helps field service companies:
- **Schedule** technicians with optimized routes
- **Track** site visits and work orders
- **Manage** customers, units, and service history
- **Automate** routine tasks (emails, reports, invoicing)

---

## Quick Start

### Requirements
- PHP 8.0+
- Composer
- MySQL/MariaDB
- Node.js & NPM
- XAMPP (or similar local server)

### Installation

```bash
# Clone the repository
git clone [repo-url] website_rebuild
cd website_rebuild

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Compile assets
npm run dev
```

### Running Locally

```bash
# Start the development server (if not using XAMPP)
php artisan serve

# Or access via XAMPP
http://localhost/website_rebuild/public
```

---

## User Roles

| Role | Description | Key Features |
|------|-------------|--------------|
| **SuperAdmin** | System-wide administration | Manage companies, global settings |
| **Admin** | Company administrator | Manage techs, customers, schedules, reports |
| **Tech** | Field technician | View schedule, complete visits, submit forms |
| **Customer** | Client portal | View service history, request service |
| **Vender** | Vendor/supplier portal | Work orders, invoicing |
| **Organization** | Organization portal | Scheduling, project management |

---

## Key Features

### Tech Management
- Add/edit/deactivate technicians
- View tech locations on map
- Assign schedules and routes

### Scheduling
- **Automated route optimization** using Google Maps API
- Drag-and-drop schedule management
- Live view of tech locations
- Daily/weekly schedule views

### Site Visits
- Track visit completion
- Service history per site
- Unit maintenance records
- QR code scanning

### Work Orders
- Create and assign work orders
- Track status (pending, in-progress, complete)
- Service Channel integration

### Reporting
- Tech performance reports
- Customer reports
- Schedule reports
- Audit reports

---

## Folder Structure

```
app/
├── Console/Commands/     # Scheduled tasks (daily, hourly, weekly)
├── Http/Controllers/
│   ├── Admin/            # Admin portal controllers
│   ├── Tech/             # Tech app controllers
│   ├── Customer/         # Customer portal controllers
│   ├── Vender/           # Vendor portal controllers
│   └── Api/              # API endpoints
├── Models/               # 57 Eloquent models
├── Jobs/                 # Background queue jobs
└── Traits/               # Reusable traits

resources/views/
├── admin/                # Admin portal views
├── tech/                 # Tech app views
├── customer/             # Customer portal views
├── layouts/              # Shared layouts & components
└── emails/               # Email templates

routes/
├── web.php               # Web routes
├── api.php               # API routes
└── console.php           # Console routes
```

---

## Scheduled Tasks

Tasks run automatically via Laravel scheduler. Add to crontab:
```bash
* * * * * cd /path/to/project && php artisan schedule:run >> /dev/null 2>&1
```

### Daily Tasks
| Time | Command | Description |
|------|---------|-------------|
| 01:00 | `serviceChannel:PendingUpdate` | Update pending status |
| 01:20 | `serviceChannel:InvoiceWorkOrders` | Process invoices |
| 01:30 | `serviceChannel:SendPhotos` | Send problem photos |
| 01:40 | `serviceChannel:UploadPdf` | Upload PDFs |
| 02:30 | `daily:setQrCodeToVirtual` | Update QR codes |
| 02:59 | `daily:autoReschedule` | Auto-reschedule visits |
| 03:00 | `daily:autoLunch` | Auto-add lunch breaks |
| 04:00 | `daily:getGPS` | Collect GPS data |
| 12:00 | `daily:autoScheduleEmail` | Send schedule emails |
| 13:00 | `daily:sendPasswordUAR` | Send password reminders |
| 22:40 | `daily:completedVisits` | Process completed visits |
| 23:30 | `daily:getFirstVisit` | Get first visit data |

### Hourly Tasks
| Command | Description |
|---------|-------------|
| `hourly:verificationEmail` | Send verification emails |
| `hourly:ProblemEmail` | Send problem notifications |

### Weekly Tasks
| Command | Description |
|---------|-------------|
| `weekly:completedVisits` | Weekly visit summary |
| `weekly:ProblemEmail` | Weekly problem report |
| `weekly:fixUnitType` | Fix unit type data |

### Monthly Tasks
| Command | Description |
|---------|-------------|
| `monthly:autoRelist` | Auto-relist items |

---

## Common Development Tasks

### Create a new controller
```bash
php artisan make:controller Admin/NewController
```

### Create a new model with migration
```bash
php artisan make:model NewModel -m
```

### Run migrations
```bash
php artisan migrate
```

### Clear caches
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Run a scheduled command manually
```bash
php artisan daily:completedVisits
```

---

## Code Conventions

### Controllers
- Admin controllers: `app/Http/Controllers/Admin/`
- Use resource methods: `index`, `store`, `update`, `destroy`
- Return views with `compact()` for passing data

### Views
- Use Blade components and includes
- CSS classes over inline styles (Bootstrap utilities)
- Tables use DataTables for sorting/filtering

### Routes
- Group by prefix: `/admin`, `/tech`, `/customer`
- Use named routes: `->name('routeName')`
- Use middleware for auth: `->middleware(['auth', 'admin'])`

### Database
- Use Eloquent relationships
- Filter at database level, not in PHP:
  ```php
  // Good
  Tech::where('deactivated', 0)->get();

  // Avoid
  Tech::all()->where('deactivated', 0);
  ```

---

## Key Models & Relationships

```
User
├── Tech (1:1)
├── CustomerUser (1:1)
├── VenderUser (1:1)
└── OrganizationUser (1:1)

Tech
├── Schedules (1:many)
├── Visits (1:many)
└── Van (1:1)

Customer
├── Regions (1:many)
├── Sites (1:many via Region)
└── CustomerUsers (1:many)

Site
├── Visits (1:many)
├── Units (1:many)
└── Region (many:1)

Visit
├── Schedule (1:1)
├── Site (many:1)
└── Tech (many:1)
```

---

## Environment Variables

Key `.env` settings:

```env
APP_NAME="Field Service Management"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=

GOOGLE_MAPS_API_KEY=your_key_here
```

---

## Troubleshooting

### "Class not found" errors
```bash
composer dump-autoload
```

### Views not updating
```bash
php artisan view:clear
```

### Route not found
```bash
php artisan route:clear
php artisan route:cache
```

### Migrations failing
```bash
php artisan migrate:status
php artisan migrate:rollback
```

---

## Team

- **Lead Developer**: [Name]
- **Developer**: Sam Alberts

---

## Links

- [Laravel Documentation](https://laravel.com/docs)
- [Bootstrap Documentation](https://getbootstrap.com/docs)
- [DataTables Documentation](https://datatables.net)
