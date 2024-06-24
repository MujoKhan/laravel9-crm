Requirement:-
  Xampp
  Laravel

1. Download project and open
2. Root folder laravel9-crm
3. .env file
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=laravel9_crm
  DB_USERNAME=root
  DB_PASSWORD=

It is for mysql or you change change base on your db connection
4. Open phpmyadmin using xampp
5. Set DB_DATABSE name same as on phpmyadmin
6. Come back on project
7. Run command "update composer"
8. Run command "php artisan migrate"
9. Run command "php artisan db:seed"
10. Run command "php artisan serve"  open project using link orip on browser

Super admin path
default url/super/login
email:- superadmin@gmail.com
password:- Superadmin1

Admin  path
deafult url /admin/login

System users
1. Super admin -> Operation on admin
2. Admin -> Operation on hr/interviewer/data admin
3. Data Admin -> Collect data and assign to hr
4. HR -> Hr will collect remaining data and assign to interviewer for each round
5. Interviewer  -> Will check detail and take interview and give response

