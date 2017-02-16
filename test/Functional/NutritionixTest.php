<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');
class NutriotionixTest extends BaseTestCase {

    public function testListMetrics() {

        $routes = [
            'getBrandedFoodByUpc',
            'getBrandedFoodById',
            'searchFoods',
            'getCaloriesBurnedForExercises',
            'getFoodsNutrients'
        ];

        foreach($routes as $file) {
            $var = '{  
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/Nutritionix/'.$file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in '.$file.' method');
        }
    }

}
