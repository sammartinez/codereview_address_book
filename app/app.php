<?php
        require_once __DIR__."/../vendor/autoload.php";
        require_once __DIR__."/../src/Contact.php";

        //Session - Stores Cookies
        session_start();

        if(empty($_SESSION['list_of_contacts'])) {
          $_SESSION['list_of_contacts'] = array();
        }

        $app = new Silex\Application();

        //Twig Path
        $app->register(new Silex\Provider\TwigServiceProvider(), array(
          'twig.path' => __DIR__.'/../views'
        ));

        //Route and Controller
        $app->get("/", function() use ($app) {
          $all_contacts = Contact::getAll();

          return $app['twig']->render('address_book.html.twig', array('contacts' => $all_contacts));
        });

        //Contact Post
        $app->post("/contacts", function() use ($app) {
          $entry = new Contact($_POST['name'], $_POST['call'], $_POST['address']);
          $entry->save();
          return $app['twig']->render('create_contact.html.twig', array('newcontact' => $entry));
        });

        //Delete Method
        $app->post("/delete_contacts", function() use ($app) {
          Contact::deleteAll();
          return $app['twig']->render('delete_contact.html.twig');
        });

        return $app;

 ?>
