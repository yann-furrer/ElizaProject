<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'recipe' => [
        'title' => 'Recipes',

        'actions' => [
            'index' => 'Recipes',
            'create' => 'New Recipe',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'recipe' => [
        'title' => 'Recipes',

        'actions' => [
            'index' => 'Recipes',
            'create' => 'New Recipe',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'img' => 'Img',
            'time' => 'Time',
            'vegan' => 'Vegan',
            
        ],
    ],

    'recipe' => [
        'title' => 'Recipes',

        'actions' => [
            'index' => 'Recipes',
            'create' => 'New Recipe',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'recipe' => [
        'title' => 'Recipes',

        'actions' => [
            'index' => 'Recipes',
            'create' => 'New Recipe',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'img' => 'Img',
            'alcool' => 'Alcool',
            
        ],
    ],

    'recipe' => [
        'title' => 'Recipes',

        'actions' => [
            'index' => 'Recipes',
            'create' => 'New Recipe',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'recipe-ing' => [
        'title' => 'Recipe Ings',

        'actions' => [
            'index' => 'Recipe Ings',
            'create' => 'New Recipe Ing',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_recipe' => 'Id recipe',
            'id_ingredient' => 'Id ingredient',
            
        ],
    ],

    'ingredient-recipe' => [
        'title' => 'Ingredient Recipes',

        'actions' => [
            'index' => 'Ingredient Recipes',
            'create' => 'New Ingredient Recipe',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name_food' => 'Name food',
            
        ],
    ],

    'ingredient-cocktail' => [
        'title' => 'Ingredient Cocktails',

        'actions' => [
            'index' => 'Ingredient Cocktails',
            'create' => 'New Ingredient Cocktail',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'cocktail' => [
        'title' => 'Cocktails',

        'actions' => [
            'index' => 'Cocktails',
            'create' => 'New Cocktail',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'img' => 'Img',
            'alcool' => 'Alcool',
            
        ],
    ],

    'ingredient-cocktail' => [
        'title' => 'Ingredient Cocktails',

        'actions' => [
            'index' => 'Ingredient Cocktails',
            'create' => 'New Ingredient Cocktail',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name_drink' => 'Name drink',
            
        ],
    ],

    'cocktail-ing' => [
        'title' => 'Cocktail Ings',

        'actions' => [
            'index' => 'Cocktail Ings',
            'create' => 'New Cocktail Ing',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'recipe' => [
        'title' => 'Recipes',

        'actions' => [
            'index' => 'Recipes',
            'create' => 'New Recipe',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'img' => 'Img',
            'time' => 'Time',
            'vegan' => 'Vegan',
            
        ],
    ],

    'cocktail-ing' => [
        'title' => 'Cocktail Ings',

        'actions' => [
            'index' => 'Cocktail Ings',
            'create' => 'New Cocktail Ing',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_cocktail' => 'Id cocktail',
            'id_ingredient' => 'Id ingredient',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];