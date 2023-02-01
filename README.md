# commandstring/jsondb #

A fully customizable JSON Database system structured similarly to MySQL

# Creating a database

```php
<?php

use CommandString\JsonDb\Structure\Database;
use CommandString\JsonDb\Structure\Table;

class YourDatabase extends Database {
    protected static array $tableClasses = [];
}
```

Create a class that extends `CommandString\JsonDb\Structure\Database` and add the property shown above. We'll come back to it later

# Creating a table

```php
<?php

use CommandString\JsonDb\Structure\Table;

class YourTable extends Table {
    protected static string $name = "yourtable";
    protected static string $fileLocation = __DIR__."/yourtable.json";
    protected static array $columns = [];
}
```

Create a class that extends `CommandString\JsonDb\Structure\Table` like the one above. The first property is how the table will be identified, the second is where the table's json will be stored/retrieved and I'll come back to the columns property later as well. However, for the tableClasses property in your database class, you will want to add your table class to it like so...

```php
// ...
protected static array $tableClasses = [YourDatabase::class];
// ...
```

and append any future tables you create to this property

# Creating a column

```php

use CommandString\JsonDb\Structure\Column;
use CommandString\JsonDb\Structure\DataTypes;

class YourColumn extends Column {
    protected static DataTypes              $type = DataTypes::STRING;
    protected static string                 $name = "YourColumn";
    protected static array                  $enumValues = [];
    protected static string|int|float|null  $default;
    protected static bool                   $nullable = false;
    protected static bool                   $unique = false;
}
```

Create a class that extends `CommandString\JsonDb\Structure\Column` then add the properties shown above. The available DataTypes are string, int, float, and enum. If the type is enum then make sure to add the values this column can be inside the enumValues array.