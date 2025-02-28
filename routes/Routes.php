<?PHP
        // routes.php
    $routes = [
        'POST' => [
            '/project' => 'ProjectController@create',
        ],
        'GET' => [
            '/project' => 'ProjectController@get',
        ],
        'PUT' => [
            '/project'=> 'ProjectController@put',
        ]
    ];

?>