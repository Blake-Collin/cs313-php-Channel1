<?php

function getConnection()
{
    try {
        $dbUrl = getenv('DATABASE_URL');

        if (empty($dbUrl)) {
            $dbUrl = "postgres://postgres:cangetin@localhost:5432/postgres";
        }

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"], '/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $ex) {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
}

/*$db = getConnection();

$result = $db->query("SELECT * FROM games");
$rows = $result->fetchAll();
var_dump($rows);*/

function insertNewUser($username, $hashedPassword) {
    $dbConn = getConnection();
    $dbConn->query("INSERT INTO users
                    (username, hashedPassword)
                    VALUES
                    ('$username', '$hashedPassword')");
    $results = $dbConn->query("SELECT id FROM users WHERE username = '$username'");
    return ($results->fetch())['id'];
}

function getHashedPassword($username) {
    $dbConn = getConnection();
    $result = $dbConn->query("SELECT id, hashedPassword FROM users WHERE username = '$username';");
    return ($result->fetch());
}