# Dealer Inspire PHP Code Challenge

Welcome to the Dealer Inspire PHP Code challenge. 

## Server Requirements

- PHP >= 7.0.0
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Important Notes

- If you run this without `Mailtrap.io` or migrating the Database -- it **`will`** have a mental break.
- **If you do not want to add `Mailtrap.io` do the following**
- Go to `App/Http/Controllers/ContactGuy.php`
- Comment out the following line.
> Line 27: Mail::to($guySmiley)->send(new contactGuyMailer($request));

## Installing

- Download repository
- run `composer install`
- Create mysql database & user with 
```
CREATE USER 'someone'@'localhost' IDENTIFIED BY 'someone';
CREATE DATABASE `dealerinspire`;
GRANT ALL PRIVILEGES ON dealerinspire.* TO 'someone'@'localhost';
```
- Remove `.example` from `.env.example`
- Add the username and database to your `.env` file
```
DB_DATABASE=dealerinspire
DB_USERNAME=someone
DB_PASSWORD=
```
- Add your mailtrap.io information to `.env` 
> I will provide mine, just ask. Not posting mailtrap keys to public repo.
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=<-insert>
MAIL_PASSWORD=<-insert>
MAIL_ENCRYPTION=null
```
- run `php artisan migrate`
```php
class ContactEmails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('contact_emails', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');
             $table->string('email');
             $table->integer('phone_number')->nullable();
             $table->longText('content');
             $table->timestamps();
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('contact_emails');
     }
}
```

## PHPUnit Test

- run PHPUnit with `./vendor/bin/phpunit`

## The Challenge

Please create a contact form in the contact form page of the website template.  Your contact
form should contain the following required fields:

- Full Name
- Email
- Message

You should also have the following non-required fields:

- Phone

Once valid information is received from the form, two processes should occur.

First, email a copy of the contact request to `guy-smiley@example.com`

Second, keep a copy of the contact form in a database so that we can review the contact form later. 
You do not need to provide an interface to access that data (for example, there will be no admin login).

## Expectations

Your contact form should be in valid HTML in our template. It should match the style of the template.

Your back-end processing should be done in PHP. You may use a framework, or plain PHP - either is fine.

Your contact form data should be validated.

One copy of the data should be emailed to the owner (listed above).  You can choose either HTML or plaintext email (or a combination).
 
One copy of the data should be kept in a MySQL, MongoDB or Postgres database.

Some indication that the contact form has been sent should be given.

You should have PHPUnit-compatible unit tests for your application.

Provide either a database schema file or a programmatic way of creating your database / tables.
 
The completed work is available in a public git repository for us to checkout and review.
