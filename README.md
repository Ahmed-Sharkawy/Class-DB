#  class-db

class-db is a small php wrapper for mysql databases.

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