# Alfred Server

[Laravel](https://laravel.com/) PHP Framework.

This a project made for the final project of the [Master of Science Interactive Media](https://www.ucc.ie/en/ckr05/) of the [University College Cork](https://www.ucc.ie/).

It is the distant server mentionned in the report.


## Setup:
All you need is to run these commands:
```bash
git clone https://github.com/NicolasGuilloux/Alfred-Server.git
cd Alfred-Server
composer install                   # Install backend dependencies
sudo chmod 777 storage/ -R         # Chmod Storage
cp .env.example .env               # Update database credentials configuration
php artisan key:generate           # Generate new keys for Laravel
php artisan migrate:fresh --seed   # Run migration and seed users and categories for testing
php artisan storage:link	       # Make the public folder in the storage accessible from a link
```


## Demo:
- Online demo: Can be found at [cloud.nicolasguilloux.eu:81](http://cloud.nicolasguilloux.eu/:81) (Offline after October 2018)


## Included Packages:

* Laravel
* Chart.js
