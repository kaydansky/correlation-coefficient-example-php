<?php
/**
 * CorrelationExample
 * @author: Alex Kaydansky
 * Date: 17.01.2020
 */

use Correlation\Correlation;
use Correlation\Exception\CorrelationException;

include 'vendor/autoload.php';

$correlation = new Correlation();

$a1 = filter_input(INPUT_POST, 'vx', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_REQUIRE_ARRAY) ?: [];
$a2 = filter_input(INPUT_POST, 'vy', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_REQUIRE_ARRAY) ?: [];
$type = filter_input(INPUT_POST, 'c_type', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?: '';

if ($a1 === false || $a2 === false || $type === false || empty($a1) || empty($a2) || empty($type) || in_array(null, $a1, true) || in_array(null, $a2, true)) {
    echo json_encode(['error' => 'Invalid or missing input data']);
    exit;
}

try {
    if ($type === 'pearson') {
        $c = $correlation->pearson($a1, $a2);
    } elseif ($type === 'spearman') {
        $c = $correlation->spearman($a1, $a2);
    } else {
        throw new InvalidArgumentException('Invalid correlation type');
    }
    echo json_encode(
        [
            'coefficient' => $c->coefficient,
            'percentage' => $c->percentage,
            'type' => ucfirst($type)
        ]);
} catch (CorrelationException $e) {
    echo json_encode(['error' => $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['error' => 'An unexpected error occurred']);
}