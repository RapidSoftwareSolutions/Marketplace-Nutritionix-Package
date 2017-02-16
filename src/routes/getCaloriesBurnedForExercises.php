<?php
$app->post('/api/Nutritionix/getCaloriesBurnedForExercises', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['applicationId', 'applicationSecret', 'exerciseDescription']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "natural/exercise";

    $body['query'] = $post_data['args']['exerciseDescription'];

    if (isset($post_data['args']['userGender']) && strlen($post_data['args']['userGender']) > 0) {
        $body['gender'] = $post_data['args']['gender'];
    };
    if (isset($post_data['args']['userWeight']) && strlen($post_data['args']['userWeight']) > 0) {
        $body['weight_kg'] = $post_data['args']['userWeight'];
    };
    if (isset($post_data['args']['userHeight']) && strlen($post_data['args']['userHeight']) > 0) {
        $body['height_cm'] = $post_data['args']['userHeight'];
    };
    if (isset($post_data['args']['userAge']) && strlen($post_data['args']['userAge']) > 0) {
        $body['age'] = $post_data['args']['userAge'];
    };


    //requesting remote API
    $client = new GuzzleHttp\Client();

    try {

        $resp = $client->request('POST', $query_str, [
            'headers' => ['x-app-id' => $post_data['args']['applicationId'], 'x-app-key' => $post_data['args']['applicationSecret']],
            'json' => $body
        ]);

        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());

        $all_data[] = $rawBody;
        if ($response->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }


    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});