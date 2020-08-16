### REST API USER REGISTRATION 

Please peform the following Steps :
After clone the file from github.
1. Install  passport for REST API using this command 
`composer require laravel/passport`
2. `php artisan passport:keys`
3. `php artisan passport:client`
4. `php artisan migrate` 

After `run` the migration command . Please run the db:seed to feed the country and state data in respective table
API ROuTE : `url/UserRegistration/register`