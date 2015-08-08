<?php

    //SPACING questions! so is this the proper spacing of four lines ?
    //I tried to be consisted across all of my project folder for spacing
    //to make sure that I was doing proper indentation just to get into the habit.
    //I think I originally did for "tab" indents instead of four spaces.
    //So really just double checking this is the proper spacing.

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
    // Sam Comments - Thanks for the feedback on my project in this post method
    //I changed the variable name to what you guys recommended.

    $app->post("/contacts", function() use ($app) {
      $contact = new Contact($_POST['name'], $_POST['call'], $_POST['address']);
      $contact->save();
      return $app['twig']->render('create_contact.html.twig', array('newcontact' => $contact));
    });

    //Delete Method
    $app->post("/delete_contacts", function() use ($app) {
      Contact::deleteAll();
      return $app['twig']->render('delete_contact.html.twig');
    });

    return $app;

 ?>
