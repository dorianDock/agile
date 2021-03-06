<?php
session_start();
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

require_once 'model/Model.php';
require_once 'model/User.php';
require_once 'model/Post.php';
require_once 'model/Vote.php';

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
$app->get('/idees',
    function () use ($app) {
       // $idees  = new Post();
        //$result =$idees->getAll();
        
        $result = Post::find(array());
        //$votes = new Votes ($idees);
       // $votes->getVotesByPost();
        $app->render('idees.php', array('idees'=>$result));
    }
);

$app->get('/updatePost/:idPost', function($idPost) use($app){
		$idee = new Post();
		$idee->getPost($idPost);
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
		$app->redirect('idees');
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
    			'idUser' => $_SESSION['id'],
    			'idPost' => $postId,
    			'isPositive' => $vote
    	);
        Vote::createNew($array);
        $app->redirect('/idees');
    }
);

$app->get('/post/moderer/editer/:postId/',
		function ($postId) use ($app) {
			$array = array(
					'idUser' => 1,
					'idPost' => $postId,
					'value' => $vote
			);
			Vote::createNew($array);
			$app->render('idees.php');
		}
);

$app->get('/post/moderer/supprimer/:postId/',
		function ($postId) use ($app) {

			echo $postId;
			Post::delete($postId);
			$app->redirect('idees');
		}
);

$app->get('/who-we-are/',
    function () use ($app) {
        $app->render('whoWeAre.php');
    }
);

$app->post('/connexion',
    function () use ($app) {
        $user = new User();
        if($user->connexion($_POST))
        {
            $app->flash('success', 'Vous êtes désormais connecté !');
            $app->redirect('./');
        }
        else{
            $app->flash('error', 'Problème de connexion');
        }
    }
);

$app->get('/connexion',
    function () use ($app) {
        $app->render('connexion.php');
    }
);


$app->get('/inscription',
    function () use ($app) {
        // le form n'est pas validé, on est en consultation, on l'affiche simplement
        $app->render('inscription.php');
    }
);

$app->post('/inscription',
    function () use ($app) {
        // Le form a été validé
        $user = new User();
        if($user->inscrire($_POST))
        {
            $app->flash('success', 'Vous êtes désormais inscrit, bienvenue !');
            $app->redirect('./');
        }
        else{
            $app->flash('error', 'Problème rencontré lors de l\'inscription ');
        }
    });

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
