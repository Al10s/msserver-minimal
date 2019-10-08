<?php

    $pdo = new PDO('sqlsrv:Server=db;Database=test', 'sa', 'i4MTHEADMIN!');

    $statement = $pdo->query('SELECT @@VERSION');
    echo '<pre>';
    var_dump($statement->fetchAll(PDO::FETCH_ASSOC));
    echo '</pre>';

    $statement = $pdo->query('SELECT TOP (50) * FROM [dbo].[test_table]');
    echo '<pre>';
    var_dump($statement->fetchAll(PDO::FETCH_ASSOC));
    echo '</pre>';
