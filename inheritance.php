<!DOCTYPE html>
<html>

<head>
	<title>Inheritance in OOP PHP</title>
</head>

<body>
<?php

class ProjectManager
{
    private Builder $builder;
    private Joiner $joiner;
    function __construct(Builder $builder, Joiner $joiner)
    {
        $this->builder = $builder;
        $this->joiner = $joiner;
    }
    public function buildHouse():void
    {
        echo "<p>{$this->builder->work()}</p>";
        echo "<p>{$this->joiner->work()}</p>";
    }
    public function payContractors():void
    {
        echo "<p>{$this->builder->pay()}</p>";
        echo "<p>{$this->joiner->pay()}</p>";
    }
}



class Builder
{
	private string $firstName;
	private string $lastName;
	function __construct(string $firstName, string $lastName)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}
	public function getFullName():string
	{
		return "{$this->firstName} {$this->lastName}";
	}
	public function work():string
	{
		return "{$this->getFullName()} has built some walls.";
	}
	public function pay():string
	{
		return "{$this->getFullName()} just got paid.";
	}
}

class Joiner
{
	private string $firstName;
	private string $lastName;
	function __construct(string $firstName, string $lastName)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}
	public function getFullName():string
	{
		return "{$this->firstName} {$this->lastName}";
	}
	public function work():string
	{
		return "{$this->getFullName()} has made some stairs.";
	}
	public function pay():string
	{
		return "{$this->getFullName()} just got paid.";
	}
}


$builder = new Builder("Jane", "Smith");
echo "<p>{$builder->work()}</p>"; //Jane Smith has built the walls.


/*
1. Open this page in a browser. You should get the message 'Jane Smith has built the walls'. Add some more code that will create an instance of the joiner class and call the work() method of this object. 
*/

/*
2. Have a look at  the Builder and Joiner classes. Have a go at creating a parent class called Contractor and have Builder and Joiner inherit from Contractor. Make Contractor Abstract (we don't want to create any Contractor instances). Think what properties and methods Joiner and Builder have in common. Think which methods need to be declared abstract. All the previous statements for creating instances should still work. 
*/

/*
3. Create another class, call this class Electrician. It will need to inherit from the Contractor class. The work() method should return a string stating the electrician has fitted the lights. Uncomment the following code to check this works.
*/

// $electrician = new Electrician("Carla", "Green");
// echo "<p>{$electrician->work()}</p>"; // Carla Green has fitted the lights
// echo "<p>{$electrician->pay()}</p>";


/*
4. Instead of working with these objects directly, we'll use the ProjectManager class. Uncomment the following lines of code that create an instance of ProjectManager and calls the buildHouse() and payContractors() methods. Check this works.
*/

$projectManager = new ProjectManager($builder, $joiner);
$projectManager->buildHouse();
$projectManager->payContractors();

/*
5. How can you modify ProjectManager so we also pass in an Electrician object to the constructor function?
*/

/*
6. One problem is that everytime we create a new kind of Contractor we have to make changes to the ProjectManager class (by adding extra properties, parameters etc.). It would be nice if we could add new types of Contractor without changing the ProjectManager class. Have a go at the following:
Remove the $builder, $joiner and $electrician properties from the ProjectManager class.
Replace them with a single $contractors property.

In the constructor function set $contractors to be an empty array i.e. $this->contractors = [];

Add a hireContractor() method that will allow us to add elements (builder, joiner etc.) to the array e.g.

public function hireContractor($contractor){
	$this->contractors[]=$contractor;
 }

Modify the buildHouse() and payContractors() methods so that they use forEach loops to call methods of Contractor objects e.g.

foreach($this->contractors as $contractor){
	echo "<p>{$contractor->work()}</p>";
}

Test this works by uncommenting the following code
*/

// $builder = new Builder("Jane","Smith");
// $joiner = new Joiner("Imran","Iqbal");
// $electrician = new Electrician("Carla","Green");
 
// $projectManager = new ProjectManager();
// $projectManager->hireContractor($builder);
// $projectManager->hireContractor($joiner);
// $projectManager->hireContractor($electrician);
// $projectManager->buildHouse();
// $projectManager->payContractors();

/*
7. Create another child class of Contractor, name it Plumber. The work() method should return a string such as '... has fitted the sink'. Modify the above code so that a plumber is also added to the project. 

Notice how we can add a plumber and we don't have to make any changes to ProjectManager class.
*/


?>
</body>

</html>
