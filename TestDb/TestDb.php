<?php

use CommandString\JsonDb\Structure\Database;

/**
 * @property-read Users $users
 */
class TestDb extends Database {
    public const USERS = "users";
    protected static array $tableClasses = [Users::class];
}