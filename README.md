#  class-db

class-DB is a small PHP wrapper for MySQL databases in which I used object-oriented programming (OOP) in my industry to make it easier for him to deal with the database in an easy and well-organized way and makes it easy for anyone to use and anyone can use it. I uploaded it to (Packagist (Composer) ) And after you read the summary of what the class does, it's time to learn how to download and run it.

## installation

install once with composer:

```
composer require ahmedmaher0/maher

```

then add this to your project:

```php
require __DIR__ . '/vendor/autoload.php';
use Ahmed\Maher\db as class_db;
$db = new class_db();
```

## usage

```php
/* connect to database */
$db = new db(['127.0.0.1', 'username', 'password', 'database']);

/* insert/update/delete */
$db->insert('tablename', [ 'key' => 'value' ])->excute();                         // return = true OR false
$db->update('tablename', [ 'key' => 'value' ])->where(['id' => $id])->excute();   // return = true OR false
$db->delete('tablename')->where(['id' => $id])->excute();                         // return = true OR false

/* select */
$db->select('tablename', 'columns')->rows();    // return more than one row
$db->select('tablename', 'columns')->first();   // return 1 Row Data
$db->select('tablename', 'columns')->where(['id' => $id])->first();    // return 1 Row Data

$db->select('tablename', 'columns')->where(['id' => $id])->andWhere(['id' => $id])->first(); // return 1 Row Data

$db->select('tablename', 'columns')->where(['id' => $id])->orWhere(['id' => $id])->first(); // return 1 Row Data

```
