<?php

class FilmController
{
	private FilmRepository $filmRepository;

	function __construct(FilmRepository $filmRepository) {
		$this->filmRepository = $filmRepository;
	}

	function loadView(string $view, array $data = [])
	{
		//The extract() function creates a variable for each key in an array e.g. 
		//$arr=["msg"=>"hello","active"=>true];
		//extract($arr);
		//echo $msg; //outputs hello
		extract($data);
		require("views/{$view}.view.php");
	}

	public function index()
	{
		//Get all the films from the model
		$films = $this->filmRepository->all();
		$this->loadView("index", ["films" => $films]);
	}
	function create()
	{
		$this->loadView("create");
	}
	function show()
	{
		//Get the id from the query string e.g. for show.php?id=2, $_GET['id'] has a value of 2
		$id = (int) $_GET['id'];
		//Get the film from the film repository
		$film = $this->filmRepository->find($id);
		$this->loadView("show", ["film" => $film]);
	}
	function store()
	{
		//get the data from the form
		$film = new Film();
		$film->title = $_POST['title'];
		$film->year = $_POST['year'];
		$film->duration = $_POST['duration'];
		//Ask the repository to save the new film
		$this->filmRepository->save($film );
		//Redirect the user to the home page
		header('Location: index.php');
	}
	function edit()
	{
		//Get the id from the query string e.g. for show.php?id=2, $_GET['id'] has a value of 2
		$id = (int) $_GET['id'];
		//Get the film from the film repository
		$film = $this->filmRepository->find($id);
		$this->loadView("edit", ["film" => $film]);
	}
	function update()
	{
		//get the data from the form
		$film = new Film();
		$film->id = $_POST['id'];
		$film->title = $_POST['title'];
		$film->year = $_POST['year'];
		$film->duration = $_POST['duration'];
		//Ask the repository to save the new film
		$this->filmRepository->save($film );
		//Redirect the user to the home page
		header('Location: index.php');
	}

	function destroy()
	{
		$id = $_POST['id'];
		$this->filmRepository->delete($id);
		//Redirect the user to the home page
		header('Location: index.php');
	}

	function about()
	{
		$this->loadView("about");
	}
}