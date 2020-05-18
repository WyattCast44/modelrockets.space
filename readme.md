![](logo.png)

# ModelRockets.Space

A home for model rocket and space nerds 🚀👨‍🚀👩‍🚀

## Installing Locally

#### Clone the repo

```bash
git clone https://github.com/WyattCast44/modelrockets.space.git
```

#### Move into project

```bash
cd modelrockets
```

#### Copy the env file

Make sure you set your local credentials in your .env file.

```bash
cp .env .example .env
```

#### Install Composer dependencies

```bash
composer install
```

#### Install NPM dependencies (Optional)

```bash
yarn install
```

#### Run Front End Asset Build (Optional)

```bash
yarn dev
```

#### Migrate the Database 

Make sure you make created a database and update the env file

```bash
php artisan migrate --seed
```

#### Cloudinary

This project uses [Cloudinary](https://cloudinary.com/) for hosting images uploaded by users, you should create a cloudinary app and set the relavant keys in the `.env` file

```bash
CLOUDINARY_API_KEY=
CLOUDINARY_CLOUD_NAME=
CLOUDINARY_API_SECRET=
```

#### Algolia

You can set up Laravel Scout with Algolia for search by adding the relevant keys to the `.env` file

```bash
SCOUT_QUEUE=true    
SCOUT_DRIVER=algolia
ALGOLIA_APP_ID=
ALGOLIA_SECRET=
ALGOLIA_SEARCH=
```

## Syncing with Algolia

You can run the following command to resync models/content with Algolia

```php
php artisan searchable:sync
```

## Testing

```bash
php artisan test
```

There is a known issue when testing publishing articles, due to technical debt, when an article is published a thead is created in the `Article Discussions` board, but if this board and the `ArticlesBot` user does not yet exist, the thread will not be created, this will lead to unforeseen and difficult problems to debug. The solution right now is just to run `php artisan migrate:fresh --seed` which will create the board and user.