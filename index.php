<?php

use CommandString\Utils\FileSystemUtils;
use CommandString\Utils\GeneratorUtils;

require_once "vendor/autoload.php";

foreach (FileSystemUtils::getAllFilesWithExtensions(__DIR__ . '/TestDb', ["php"], true) as $file) {
    require_once($file);
}

$db = new TestDb(JSON_PRETTY_PRINT);

$db->users->newRow()
    ->setColumn($db->users::UUID, GeneratorUtils::uuid())
    ->setColumn($db->users::USERNAME, "Command_String")
    ->setColumn($db->users::PASSWORD, password_hash("123456", PASSWORD_DEFAULT))
    ->store()
;