<?php

namespace Project;

use Project\Columns\Description;
use Project\Columns\End;
use Project\Columns\Image;
use Project\Columns\Name;
use Project\Columns\Start;
use CommandString\JsonDb\Structure\Table;

/**
 * @property-write string $name
 * @property-write int $end
 * @property-write string $image
 * @property-write int $start
 * @property-write string $description
 */
class Project extends Table {
    public const DESCRIPTION = "description";
    public const END = "end";
    public const IMAGE = "image";
    public const NAME = "name";
    public const START = "start";

    protected static string $name = "projects";
    protected static string $fileLocation = __DIR__."/db.json";
    protected static array $columns = [Name::class, Description::class, End::class, Image::class, Start::class];
    protected static int $encoderFlags = JSON_PRETTY_PRINT;
}