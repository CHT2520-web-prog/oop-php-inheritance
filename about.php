<?php
require 'Film.php';
require 'FilmRepository.php';
require 'BaseController.php';
require 'FilmController.php';

$filmRepository = new FilmRepository('db','webdev','student','secret');
$filmController = new FilmController($filmRepository);
$filmController->about();