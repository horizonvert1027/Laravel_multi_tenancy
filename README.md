<h1 align="center">Laravel Multi-tenant with Saas</h1>
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
 
## About Laravel Multi-Tenant Function

While working on the Sass platform, I was confused and had many mistakes. Fortunately, with the help of several highly skilled developers, I was able to solve this problem and am happy to post it here. Hope this helps developers in this field. Thanks
 
## Installation Guide

1. `git clone https://github.com/horizonvert1027/Laravel_multi_tenancy.git`

2. `cd Laravel_multi_tenancy`

3. `composer install`

4. `cp .env.example .env`

5. Generate application key: `php artisan key:generate`

6. Configure your environment variables in the .env file, including database connection details

7. Migrate the database: `php artisan migrate`

8. Make sub domain using tinker : `php artisan tinker`<br/>
    `$ php artisan tinker`<br/>
        `>>> $tenant1 = App\Models\Tenant::create(['id' => 'foo']);`<br/>
        `>>> $tenant1->domains()->create(['domain' => 'foo.localhost']);`<br/>
        `>>>`<br/>
        `>>> $tenant2 = App\Models\Tenant::create(['id' => 'bar']);`<br/>
        `>>> $tenant2->domains()->create(['domain' => 'bar.localhost']);`<br/>
    Then Create a user inside each tenant's database:<br/>
    `App\Models\Tenant::all()->runForEach(function () {`<br/>
        `App\Models\User::factory()->create();`<br/>
     `});`<br/>

9. Start the development server: `php artisan serve`

10. Access the application in your web browser at `http://foo.localhost:8000` and `http://bar.localhost:8000`
    Congratulation ! You can see different user in each browser.

## Contact Info

If you are first with laravel multi-tanent, may have some missing understand about code or runed failed sad.

But Don't worry, you are always around with kind peoples and we can help you.


