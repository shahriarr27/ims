<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Bongo Laravel boilerplate

Bongo is a laravel boilerplate. you will feel comfort and of course will save your time. Bongo boilerplate is build with

# Frontend & Backend
- [Admin-lte3](https://adminlte.io/)
- [Bootstrap-4](https://getbootstrap.com/docs/4.0/getting-started/introduction/)
- [jQuery 3.6](https://jquery.com/)
- [Laravel 9](https://laravel.com/)
- [Laravel Permission | Spatie](https://spatie.be/docs/laravel-permission/v5/introduction)
- [Yajra-Datatable](https://datatables.yajrabox.com/)

Install Process
```
git clone git@github.com:dev-rashed/Laravel-Boilerplate.git
cd Laravel-Boilerplate
composer update
cp .env.example .env
```

#### Create a database and config env file
#### Generate Public key
```
php artisan key:generate
```
#### Migrate Database
```
php artisan migrate
```
#### Store default routes in permission table
```
php artisan permission:create-permission-routes
```
#### Now seed an admin user with all of the permission and admin role
```
php artisan db:seed --class=CreateAdminUserSeeder
```

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
