<?php
$routes = [
    'getBrandedFoodByUpc',
    'getBrandedFoodById',
    'searchFoods',
    'getCaloriesBurnedForExercises',
    'getFoodsNutrients',
    'metadata'
];
foreach ($routes as $file) {
    require __DIR__ . '/../src/routes/' . $file . '.php';
}

