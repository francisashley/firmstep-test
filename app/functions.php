<?php

function get($pdo, $filter=false) {
    $sql = 'SELECT * FROM queue WHERE queuedDate >= cast((now()) AS DATE) AND queuedDate < cast((now() + interval 1 day) AS DATE)';

    if ($filter !== false) $sql .= ' type = ' . $filter;

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function store($pdo, $type, $firstName, $lastName, $organization, $service) {
    $stmt = $pdo->prepare('INSERT into queue (type, firstName, lastName, organization, service)
                           VALUES (:type, :firstName, :lastName, :organization, :service)');

    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':organization', $organization);
    $stmt->bindParam(':service', $service);

    try {
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        pre($e->getMessage());
        return false;
    }
}

function pre($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

function display_json($arr) {
    echo '<pre>';
    echo json_encode($arr, JSON_PRETTY_PRINT);
    echo '</pre>';
}