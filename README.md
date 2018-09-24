
# SlimOOP - Slim Object Oriented Version

This is a *Development* Version , Need lot more optimizations, I will update this repo soon
## Getting Started

Slim is a PHP micro framework that helps you quickly write simple yet powerful web applications and API , and wew just modified it to work with our needs .

Object Oriented Format 



### Prerequisites

#### php
#### Composer

``` 
php version >= 7.1
```

### Installing

    git clone https://github.com/JijinJayakumar/slimoop.git
    cd slimoop
    composer Install
    DONE
To access your project

```
http://localhost/slimoop/api/v1/ YOUR ROUTE NAME
```

Libraries used 

**twig** 			`html templates`
**eloquent** `ORM - I suggest eloquent over PDO :)`
**monolog** `for logs`
**slimpdo** ``PDO support for slim``

## Basic Configrations

	Database Configrations
#### eloquent configration

go to 

		v1\src\config\Settings.php
		Add DB values, 
		DONE
Create Models in `v1\src\app\Models` 
	

> how to access and more example given in sample controllers, please refer to ***user*** **controller** for live example, 
> also refer official eloquent documentation
> https://laravel.com/docs/master/eloquent

#### PDO configration
		v1\src\config\Environment.php
		Add DB values, 
		DONE
		
use **$this->pdo** object to execute PDO functions
***example***

    $statement  =  $this->pdo->prepare("SELECT  `fields` FROM table` WHERE `field`= $fieldid'"); 
    $statement->execute(); 
    return  $statement->fetchAll($this->pdo::FETCH_ASSOC);

## Usage

Whenever you create a controller class 
	Lets assume that is **`src/app/controllers/Login.php`**
				

	    <?php
    	namespace  v1\src\app\Controllers;
    	
    	use  v1\src\config\Api_Controller;
    	
    	class  Login extends  Api_Controller
    	{
		    public function __construct(){
				parent::__construct();
			}
			public function forgotPassword(){
				//Logic here
			}
    	} 
    	?>

Then we must inject that class in  `src/dependecies.php`

for example you have *Login* class controller 

    $container['Login'] =  function  ($container)  {
    return  new  v1\src\app\Controllers\Login($container);
    };
    	



## Basic Tags 
##### always Extend Api_Controller to access global variables

> **$this->db**  =  ELOQUENT Database Object
> use this to acces ELOQUENT DATABSE without creating model

> **$this->request**  = Slim request object
> to  access 

> **$this->response**  =  slim response object

> **$this->logger**  =  Access Logger

> **$this->view**  =  access View page
 
> **$this->uri**  =  Parse Url

> **$this->input**  =  Parse REQUEST objects
>  
>  example $this->input['user_name']; 

> **$this->env**  =  To access ENVIRONEMENT vaues

> **$this->pdo**  =  new PDO Object



## Contributing
We love your input! We want to make contributing to this project as easy and transparent as possible, whether it's:

-   Reporting a bug
-   Discussing the current state of the code
-   Submitting a fix
-   Proposing new features
-   Becoming a maintainer
- 
If you think something important is missing or should be different based on your experience, I'd love to hear it!. If you have suggestions for improving this Project, open an issue on this project.


Pull requests are the best way to propose changes to the codebase , We actively welcome your pull requests:

1.  Fork the repo and create your branch from  `master`.
2.  If you've added code that should be tested, add tests.
3.  If you've changed APIs, update the documentation.
4.  Ensure the test suite passes.
5.  Make sure your code lints.
6.  Issue that pull request!

## Authors

* **Jijin** - *Initial work*


## License

This project is licensed under the MIT License 

## Acknowledgments

* Free time project, please share your suggestions and improvments :)
