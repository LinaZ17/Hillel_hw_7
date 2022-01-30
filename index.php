<?php
include 'vendor/autoload.php';

use app\Classes\QueryBuilder;
use app\Classes\DB;

$builder = new QueryBuilder();
$builder->table('users')
    ->select(['first_name', 'age'])
    ->where(["status = 'active'"])
    ->order(["id  ASC"])
    ->limit(20)
    ->offset(40)
    ->build();


$builder = new QueryBuilder();
$query = $builder->table('users')
    ->select(['first_name', 'age'])
    ->where(["status = 'active'"])
    ->order(["id ASC"])
    ->limit(2)
    ->offset(0)
    ->build();
print_r($sql = $query->toSql());

echo '<hr>';

$db = new DB();

$builder = new QueryBuilder();
$builder->table('users')
    ->select(['first_name', 'age'])
    ->where(['id' => 2])
    ->build();
$user = $db->one($query);
echo '<pre>';
print_r($user);
echo '</pre>';

echo '<hr>';

echo '<pre>';
$user = $db->all($query);
echo '<pre>';
print_r($user);
echo '</pre>';

