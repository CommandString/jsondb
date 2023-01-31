<?php

namespace CommandString\JsonDb\Query;

enum Operators {
    case EQUAL_TO;
    case GREATER_THAN;
    case LESS_THAN;
    case IN;
}