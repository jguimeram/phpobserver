<?php

use Observer\subscriber\SubscriberClass;
use Observer\publisher\PublisherClass;

require (__DIR__ . '/../vendor/autoload.php');

$pub = new PublisherClass("hello, world");
$sub = new SubscriberClass;

$pub->attach($sub);

$pub->notify();

$pub->setNewData('Fuck me, Cris');

$pub->notify();