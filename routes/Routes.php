<?PHP
        // routes.php
    $routes = [
        'POST' => [
            '/project' => 'ProjectController@create',
        ],
        'GET' => [
            '/project' => 'ProjectController@get',
        ]
    ];

?>