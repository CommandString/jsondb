<?php

use CommandString\JsonDb\Structure\Table;

class Users extends Table {
    public const USERNAME = "username";
    public const PASSWORD = "password";
    public const UUID = "uuid";

    protected static string $name = "users";
    protected static string $fileLocation = __DIR__."/users.json";
    protected static array $columns = [Username::class, Password::class, Uuid::class];
}