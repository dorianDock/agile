<?php
/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
require 'View/myView.php';

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
 
 $myView=new MyView();
 $myView::set_layout('defaultView.php');
 
$app = new \Slim\Slim(array(
    'view' => $myView
));

require_once 'model/User.php';
require_once 'model/Post.php';

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */
 
$app->config(array(
    'debug' => true,
    'templates.path' => './View'
));

// GET route
$app->get('/pipeau/:name',
    function ($name) use ($app) {
        $app->render('vue.php', array('name'=>$name));
    }
);


$app->get('/idees',
    function ($name) use ($app) {
        require_once 'Models/idees.php';
        $idees = new Idees();
        $idees->getAll();
        $votes = new Votes ($idees);
        $votes->getVotesByPost();
        $app->render('idees.php', array('idees'=>$idees));
    }
);

// GET route
$app->get('/insert/', function() use($app){
		$app->render('insertPostForm.php', array('userId' => 1));
	}
);

$app->get('/updatePost/:idPost', function() use($app){
		$app->render('AmeliorerIdee.php');
	}
);


// GET route
$app->post('/insertPost/', function() use($app){
		$array = array(
				'idAuteur' => 1,
				'titre' => $app->request->post('titre'),
				'message' => $app->request->post('message')
		);
		Post::createNew($array);
		$app->render('index.php');
	}
);

$app->get('/',
    function () use ($app) {
        $app->render('accueil.php');
    }
);

$app->get('/post/voter/:postId/:vote',
    function ($postId, $vote) use ($app) {
    	if($vote != 1 && $vote != -1){
    		return;
    	}
    	$array = array(
    			'idUser' => 1,
    			'idPost' => $postId,
    			'value' => $vote
    	);
        Vote::createNew($array);
        $app->render('idees.php');
    }
);


// POST route
$app->post(
    '/post',
    function () {
        echo 'This is a POST route';
    }
);

// PUT route
$app->put(
    '/put',
    function () {
        echo 'This is a PUT route';
    }
);

// PATCH route
$app->patch('/patch', function () {
    echo 'This is a PATCH route';
});

// DELETE route
$app->delete(
    '/delete',
    function () {
        echo 'This is a DELETE route';
    }
);

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
