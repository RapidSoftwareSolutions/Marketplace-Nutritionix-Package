[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Nutritionix/functions?utm_source=RapidAPIGitHub_NutritionixFunctions&utm_medium=button&utm_content=RapidAPI_GitHub) 
# Nutritionix Package
Nutritionix
* Domain: Nutritionix.com
* Credentials: applicationId, applicationSecret

## How to get credentials: 
0. Go to [Nutritionix website](https://developer.nutritionix.com) 
1. Log in or create a new account
2. Register an application
2. Go to [Application page](https://developer.nutritionix.com/admin/access_details) to get your application Id and application Keys


## Nutritionix.getFoodsNutrients
Returns the nutrients for all foods in request.

| Field            | Type       | Description
|------------------|------------|----------
| applicationId    | credentials| The application id received from Nutritionix.
| applicationSecret| credentials| The application key received from Nutritionix
| foodDescription  | String     | Natural language description of the food.

## Nutritionix.getCaloriesBurnedForExercises
Estimate calories burned for various exercises using natural language.

| Field              | Type       | Description
|--------------------|------------|----------
| applicationId      | credentials| The application id received from Nutritionix.
| applicationSecret  | credentials| The application key received from Nutritionix
| exerciseDescription| String     | Natural language description of the exercise.
| userGender         | String     | Gender of the user. Possible values: male or female.
| userWeight         | String     | Weight of the user in KG
| userHeight         | String     | Height of the user in CM
| userAge            | Number     | Age of the user

## Nutritionix.searchFoods
Populate any search interface, including autocomplete, with common foods and branded foods from Nutritionix.

| Field            | Type       | Description
|------------------|------------|----------
| applicationId    | credentials| The application id received from Nutritionix.
| applicationSecret| credentials| The application key received from Nutritionix
| foodDescription  | String     | Natural language description of the food.

## Nutritionix.getBrandedFoodById
Look up the nutrition information for any branded food item.

| Field            | Type       | Description
|------------------|------------|----------
| applicationId    | credentials| The application id received from Nutritionix.
| applicationSecret| credentials| The application key received from Nutritionix
| foodId           | String     | Id of the food item.

## Nutritionix.getBrandedFoodByUpc
Look up the nutrition information for any branded food item.

| Field            | Type       | Description
|------------------|------------|----------
| applicationId    | credentials| The application id received from Nutritionix.
| applicationSecret| credentials| The application key received from Nutritionix
| foodUpc          | Number     | Upc of the food item.

