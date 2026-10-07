<?php
require 'Database.php';
require 'Film.php';
require 'FilmRepository.php';
require 'BaseController.php';
require 'FilmController.php';

$database = new Database('localhost','webdev','student','secret');
$conn = $database->getConnection();
$filmRepository = new FilmRepository($conn);
$filmController = new FilmController($filmRepository);
$filmController->show();

