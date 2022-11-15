1. Clone this repo
git clone https://github.com/avijitsamanta/laravel-quiz-app.git

2.Install composer packages

cd laravel-quiz-app

composer install

3.npm install
npm run dev

4.Create and setup .env file

cp .env.example .env

php artisan key:generate

5.put database credentials in .env file

for testing add database name on quizzing

6.Migrate and insert records

php artisan migrate --seed

Dummy credentials

- User: user@user.com password: password
- Admin: admin@admin.com password: password
