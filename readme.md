## CL-Team

__Update October 2019__: this project was created in 2017 as Laravel 5.4 version, and now we upgraded it to Laravel 6 version, also changed the design theme from [AdminLTE](https://adminlte.io/) to [CoreUI](https://coreui.io)

- - - - -

## Usage

This is not a package - it's a full Laravel project that you should use as a starter boilerplate, and then add your own custom functionality.

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- `chmod -R 777 ./storage/`
- Run `composer install`
- Run `php artisan key:generate`
- `php artisan config:clear`
- `php artisan storage:link`
- `npm install`
- Run `php artisan migrate --seed` (it has some seeded data - see below)
- That's it: launch the main URL and login with default credentials `admin@admin.com` - `password`


## License

The [MIT license](http://opensource.org/licenses/MIT).

---
