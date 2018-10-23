<?php
require 'test_functions.php';
require 'classes/Test.php';

// SETUP

$test = new Test();

$test->clear_database();
$test->pet_adding();
$test->pet_deleting();





