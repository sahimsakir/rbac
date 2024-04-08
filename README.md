# Developing a Role Back Access Control using Laravel
This demo application shows how to build a simple role back access control software using Laravel. 

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
What things do you need to install the software?

* Git.
* PHP.
* Composer.
* Laravel CLI.
* A webserver like Nginx or Apache.
* A Node Package Manager ( npm or yarn ).

### Install
Clone the git repository on your computer
```
$ git clone https://github.com/sahimsakir/rbac.git
```

You can also download the entire repository as a zip file and unpack in on your computer if you do not have git

After cloning the application, you need to install its dependencies. 
```
$ cd rbac
$ composer install
```

### Setup
- When you are done with the installation, copy the `.env.example` file to `.env`
```
$ cp .env.example .env
```
- Create a database the same as declared as the .env file

- Generate the application key
```
$ php artisan key:generate
```

- Add your database credentials to the necessary `env` fields

- Migrate the application
```
$ php artisan migrate
```

- Seed Database
```
php artisan db:seed
```

- Install node modules
```
$ npm install
```
```
$ npm run dev
```

### Run the application
```
$ php artisan serve
```

### Login Details
```
user: superadmin@gmail.com
pass: 123456
```
