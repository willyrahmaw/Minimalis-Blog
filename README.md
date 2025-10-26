# Blog Application with Admin Dashboard

A modern, responsive blog application built with Laravel featuring a complete admin dashboard, user authentication, and a beautiful frontend with dark mode support.

## ✨ Features

### Frontend
- **Responsive Design** - Mobile-first approach with Bootstrap 5
- **Dark Mode Toggle** - Light/dark theme with localStorage persistence
- **Interactive Search** - Real-time search with popup interface
- **Scroll Animations** - Smooth animations on scroll with Intersection Observer
- **Scroll to Top** - Rocket button for easy navigation
- **Anti-Copy Protection** - Content protection against copying and right-click
- **SEO Optimized** - Meta tags, structured data, and performance optimizations
- **Pagination** - Clean pagination for blog posts
- **Minimalist Design** - Clean, modern UI with elegant typography

### Admin Dashboard
- **Collapsible Sidebar** - Expandable/collapsible sidebar (250px ↔ 60px)
- **Role-Based Access Control** - Admin and user roles with different permissions
- **Post Management** - Full CRUD operations for blog posts
- **WYSIWYG Editor** - CKEditor integration for rich text editing
- **Settings Management** - Blog configuration (name, description, keywords, author)
- **User Management** - User authentication and role management
- **Statistics Dashboard** - Post counts, views, and analytics
- **Responsive Design** - Works perfectly on desktop and mobile

### Technical Features
- **Laravel 12.x** - Latest Laravel framework
- **SQLite/MySQL** - Database flexibility
- **Security Headers** - CSP, XSS protection, and security middleware
- **Performance Optimized** - Deferred loading, font optimization, DNS prefetch
- **Accessibility** - ARIA labels, keyboard navigation, screen reader support

## 🚀 Installation

### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js & NPM (for asset compilation)
- SQLite or MySQL

### Step 1: Clone Repository
```bash
git clone <repository-url>
cd blog
```

### Step 2: Install Dependencies
```bash
composer install
npm install
```

### Step 3: Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### Step 4: Database Configuration
For SQLite (default):
```bash
touch database/database.sqlite
```

For MySQL, update `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Step 5: Run Migrations
```bash
php artisan migrate
```

### Step 6: Seed Database
```bash
php artisan db:seed
```

### Step 7: Start Development Server
```bash
php artisan serve
```

Visit `http://localhost:8000` to see the application.

## 👥 Default Users

After seeding, you'll have these users:

| Email | Password | Role |
|-------|----------|------|
| admin@blog.com | password | Admin |
| john@doe.com | password | User |
| jane@doe.com | password | User |
| jim@doe.com | password | User |

## 📁 Project Structure

```
blog/
├── app/
│   ├── Http/Controllers/
│   │   ├── PostController.php      # Blog posts management
│   │   ├── SettingsController.php  # Blog settings
│   │   └── Auth/AuthController.php # Authentication
│   ├── Models/
│   │   ├── Post.php               # Post model
│   │   ├── User.php               # User model
│   │   └── Settings.php           # Settings model
│   └── Http/Middleware/
│       └── SecurityHeaders.php    # Security middleware
├── database/
│   ├── migrations/                # Database migrations
│   └── seeders/                   # Database seeders
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php      # Frontend layout
│       │   ├── admin.blade.php    # Admin layout
│       │   ├── nav.blade.php      # Navigation partial
│       │   ├── footer.blade.php   # Footer partial
│       │   └── search.blade.php   # Search partial
│       ├── blog/
│       │   ├── index.blade.php    # Blog listing
│       │   └── show.blade.php     # Single post view
│       ├── admin/
│       │   ├── dashboard.blade.php # Admin dashboard
│       │   ├── settings/
│       │   └── posts/
│       └── auth/
│           ├── login.blade.php    # Login page
│           └── register.blade.php # Registration page
├── public/
│   └── assets/
│       ├── css/                   # Custom styles
│       └── js/                    # JavaScript files
└── routes/
    └── web.php                    # Application routes
```

## 🎨 Customization

### Blog Settings
Access admin dashboard → Settings to configure:
- Blog name
- Blog description
- SEO keywords
- Author name

### Styling
- **Frontend**: Edit `public/assets/css/style.css`
- **Admin**: Edit styles in `resources/views/layouts/admin.blade.php`
- **Colors**: Update CSS variables for consistent theming

### Features
- **Dark Mode**: Toggle in navbar (sun/moon icons)
- **Search**: Click search icon for popup interface
- **Sidebar**: Click toggle button to collapse/expand admin sidebar

## 🔧 Configuration

### Security Headers
The application includes comprehensive security headers:
- Content Security Policy (CSP)
- X-Frame-Options
- X-Content-Type-Options
- Referrer-Policy
- Permissions-Policy

### Performance
- Deferred CSS/JS loading
- Font display optimization
- DNS prefetch for CDNs
- Image optimization

## 📱 Responsive Design

### Breakpoints
- **Mobile**: < 992px (hamburger menu, overlay sidebar)
- **Desktop**: ≥ 992px (collapsible sidebar, full navigation)

### Mobile Features
- Touch-friendly interface
- Swipe gestures
- Optimized typography
- Fast loading

## 🔐 Security Features

- **CSRF Protection** - All forms protected
- **XSS Prevention** - Input sanitization
- **SQL Injection Protection** - Eloquent ORM
- **Content Security Policy** - Strict CSP headers
- **Anti-Copy Protection** - Content protection
- **Role-Based Access** - Admin/user permissions

## 🚀 Deployment

### Production Setup
1. Set `APP_ENV=production` in `.env`
2. Run `php artisan config:cache`
3. Run `php artisan route:cache`
4. Run `php artisan view:cache`
5. Set up web server (Apache/Nginx)
6. Configure SSL certificate

### Environment Variables
```env
APP_NAME="Your Blog Name"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=your_host
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## 🧪 Testing

```bash
# Run tests
php artisan test

# Run specific test
php artisan test --filter=PostTest
```

## 📊 Admin Dashboard Features

### Statistics Cards
- Total Posts
- Published Posts
- Draft Posts
- Total Views

### Post Management
- Create new posts
- Edit existing posts
- Delete posts
- View post statistics
- Publish/unpublish posts

### User Management
- Role-based access control
- User authentication
- Session management

## 🎯 SEO Features

- Meta descriptions
- Open Graph tags
- Structured data
- Sitemap generation
- Clean URLs with slugs
- Mobile-friendly design

## 🔄 Updates & Maintenance

### Regular Tasks
- Update dependencies: `composer update`
- Clear caches: `php artisan cache:clear`
- Optimize autoloader: `composer dump-autoload`

### Database Maintenance
- Backup database regularly
- Monitor performance
- Update indexes as needed

## 🤝 Contributing

1. Fork the repository
2. Create feature branch: `git checkout -b feature/amazing-feature`
3. Commit changes: `git commit -m 'Add amazing feature'`
4. Push to branch: `git push origin feature/amazing-feature`
5. Open Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🆘 Support

For support and questions:
- Create an issue in the repository
- Check the documentation
- Review the code comments

## 🙏 Acknowledgments

- Laravel Framework
- Bootstrap 5
- Font Awesome
- CKEditor
- All contributors and users

---

**Happy Blogging! 🎉**