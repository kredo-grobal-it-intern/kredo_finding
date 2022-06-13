## Setup
`less ~/.ssh/id_rsa.pub`

if you don't have `.ssh/id_rsa.pub`

`ssh-keygen -t rsa -C "your_github_email@example.com"` 

Github > Settings > SSH and GPG keys

##### install php 
`php -v`

if you don't have any PHP version

`brew install php@7.4`

if you have any PHP version

`phpenv install 7.4.29`

`brew --prefix php@7.4`

`echo 'export PATH="/opt/homebrew/opt/php@7.4/bin:$PATH"' >> ~/.zshrc`

##### install mysql 
if you don't have mysql `brew install mysql`

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

##### Set Sequel Ace
<img width="485" alt="Screen Shot 2022-06-10 at 4 32 39 PM" src="https://user-images.githubusercontent.com/105486119/173014301-bf3c0b08-ae1a-48fa-930b-d13a8f8674b7.png">

Name: localhost/kredo_finding

HOST: localhost

USERNAME: root

PASSWORD:     

DATABASE: kredo_finding

PORT: 3306
