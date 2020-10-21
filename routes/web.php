<?php
/*
|--------------------------------------------------------------------------
| Authentication routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */
$router->group(['middleware' => 'localization'], function ($router) {

    /* News listing */
    $router->get('/app/news', ['as' => 'app.news.list',
        'middleware' => 'localization|tenant.connection|jwt.auth|user.profile.complete|PaginationMiddleware',
        'uses' => 'App\News\NewsController@index']);

    /* Fetch news details*/
    $router->get('/app/news/{newsId}', ['as' => 'app.news.show',
        'middleware' => 'localization|tenant.connection|jwt.auth|user.profile.complete',
        'uses' => 'App\News\NewsController@show']);
		
});

/*
|
|--------------------------------------------------------------------------
| Tenant Admin Routes
|--------------------------------------------------------------------------
|
| These are tenant admin routes to manage tenant users, settings, and etc.
|
 */

    /* News category management */
    $router->group(
        ['prefix' => '/news/category', 'middleware' => 'localization|auth.tenant.admin|JsonApiMiddleware'],
        function ($router) {
            $router->get('/', ['middleware' => ['PaginationMiddleware'],
                'uses' => 'Admin\NewsCategory\NewsCategoryController@index']);
            $router->get('/{newsCategoryId}', ['uses' => 'Admin\NewsCategory\NewsCategoryController@show']);
            $router->post('/', ['uses' => 'Admin\NewsCategory\NewsCategoryController@store']);
            $router->patch('/{newsCategoryId}', ['uses' => 'Admin\NewsCategory\NewsCategoryController@update']);
            $router->delete('/{newsCategoryId}', ['uses' => 'Admin\NewsCategory\NewsCategoryController@destroy']);
        }
    );

    /* News management */
    $router->group(
        ['prefix' => '/news', 'middleware' => 'localization|auth.tenant.admin|JsonApiMiddleware'],
        function ($router) {
            $router->get('/', ['middleware' => ['PaginationMiddleware'],
                'uses' => 'Admin\News\NewsController@index']);
            $router->get('/{newsId}', ['uses' => 'Admin\News\NewsController@show']);
            $router->post('/', ['uses' => 'Admin\News\NewsController@store']);
            $router->patch('/{newsId}', ['uses' => 'Admin\News\NewsController@update']);
            $router->delete('/{newsId}', ['uses' => 'Admin\News\NewsController@destroy']);
        }
    );
