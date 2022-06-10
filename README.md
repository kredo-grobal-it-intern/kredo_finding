## Setup
`less ~/.ssh/id_rsa.pub`

Github > Settings > 

##### install php 
`php -v`

##### 1. Clone repository
`git clone git@github.com:kredo-grobal-it-intern/kredo_finding.git`

##### 2. Go to your directory
`cd kredo_finding`

##### 3. Install Composer Libraries
`composer install`

##### 4. Setup Environment
`[create database kredo_finding]`

##### 5. Run migration and seeder
`php artisan migrate`

`php artisan db:seed`

##### 6. make images folder & Run storage:link
`mkdir storage/app/public/images`

`php artisan storage:link`

##### 7. Run npm
`npm install`

`npm run dev`
