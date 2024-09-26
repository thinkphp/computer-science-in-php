# Introduction to PHP Coursework

## Table of Contents
1. [Introduction to PHP](#1-introduction-to-php)
2. [Variables and Data Types](#2-variables-and-data-types)
3. [Control Structures](#3-control-structures)
4. [Functions](#4-functions)
5. [Arrays](#5-arrays)
6. [Superglobals and Forms](#6-superglobals-and-forms)
7. [Working with Files](#7-working-with-files)
8. [Object-Oriented Programming](#8-object-oriented-programming)
9. [Database Interaction](#9-database-interaction)
10. [Error Handling](#10-error-handling)

## 1. Introduction to PHP

PHP (Hypertext Preprocessor) is a server-side scripting language designed for web development but also used as a general-purpose programming language.

### 1.1 Basic Syntax
```php
<?php
// Example 1: Hello World
echo "Hello, World!";

// Example 2: PHP info
phpinfo();

// Example 3: Embedding PHP in HTML
?>
<html>
<body>
    <h1><?php echo "Welcome to PHP!"; ?></h1>
</body>
</html>
```

## 2. Variables and Data Types

### 2.1 Variables
```php
<?php
// Example 1: Variable declaration and assignment
$name = "John";
$age = 25;
echo "My name is $name and I am $age years old.";

// Example 2: Variable scope
$x = 5; // global scope
function myTest() {
    $y = 10; // local scope
    global $x; // accessing global variable
    echo "x is $x and y is $y";
}
myTest();

// Example 3: Static variables
function counter() {
    static $count = 0;
    echo $count;
    $count++;
}
counter(); // Output: 0
counter(); // Output: 1
counter(); // Output: 2
?>
```

### 2.2 Data Types
```php
<?php
// Example 1: Numeric types
$int_var = 42;
$float_var = 3.14;
echo gettype($int_var) . ", " . gettype($float_var);

// Example 2: String
$str = "Hello, PHP!";
echo strlen($str); // Output: 11

// Example 3: Boolean
$is_student = true;
echo $is_student ? "Yes" : "No"; // Output: Yes
?>
```

## 3. Control Structures

### 3.1 Conditional Statements
```php
<?php
// Example 1: If-else statement
$age = 18;
if ($age >= 18) {
    echo "You are an adult.";
} else {
    echo "You are a minor.";
}

// Example 2: Switch statement
$day = "Monday";
switch ($day) {
    case "Monday":
        echo "It's the start of the week.";
        break;
    case "Friday":
        echo "Weekend is near!";
        break;
    default:
        echo "It's a regular day.";
}

// Example 3: Ternary operator
$score = 75;
$result = ($score >= 60) ? "Pass" : "Fail";
echo $result;
?>
```

### 3.2 Loops
```php
<?php
// Example 1: For loop
for ($i = 1; $i <= 5; $i++) {
    echo $i . " ";
}

// Example 2: While loop
$counter = 0;
while ($counter < 5) {
    echo "Count: $counter ";
    $counter++;
}

// Example 3: Foreach loop
$colors = ["red", "green", "blue"];
foreach ($colors as $color) {
    echo $color . " ";
}
?>
```

## 4. Functions

### 4.1 User-defined Functions
```php
<?php
// Example 1: Simple function
function greet($name) {
    return "Hello, $name!";
}
echo greet("Alice");

// Example 2: Function with default parameter
function power($base, $exponent = 2) {
    return pow($base, $exponent);
}
echo power(3); // Output: 9
echo power(2, 3); // Output: 8

// Example 3: Variable-length argument lists
function sum(...$numbers) {
    return array_sum($numbers);
}
echo sum(1, 2, 3, 4, 5); // Output: 15
?>
```

## 5. Arrays

### 5.1 Array Manipulation
```php
<?php
// Example 1: Indexed arrays
$fruits = ["apple", "banana", "cherry"];
echo $fruits[1]; // Output: banana

// Example 2: Associative arrays
$person = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];
echo $person["name"]; // Output: John

// Example 3: Multidimensional arrays
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
echo $matrix[1][1]; // Output: 5
?>
```

## 6. Superglobals and Forms

### 6.1 Working with Forms
```php
<!-- Example 1: HTML Form -->
<form method="post" action="process.php">
    <input type="text" name="username">
    <input type="submit" value="Submit">
</form>

<?php
// process.php
// Example 2: Accessing form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    echo "Hello, $username!";
}

// Example 3: Using GET parameters
// Assuming URL: page.php?id=123&action=view
$id = $_GET["id"];
$action = $_GET["action"];
echo "ID: $id, Action: $action";
?>
```

## 7. Working with Files

### 7.1 File Operations
```php
<?php
// Example 1: Reading a file
$content = file_get_contents("example.txt");
echo $content;

// Example 2: Writing to a file
$data = "This is some content.";
file_put_contents("output.txt", $data);

// Example 3: Appending to a file
$newData = "This is additional content.";
file_put_contents("output.txt", $newData, FILE_APPEND);
?>
```

## 8. Object-Oriented Programming

### 8.1 Classes and Objects
```php
<?php
// Example 1: Simple class
class Car {
    public $brand;
    public function __construct($brand) {
        $this->brand = $brand;
    }
    public function getBrand() {
        return $this->brand;
    }
}
$myCar = new Car("Toyota");
echo $myCar->getBrand(); // Output: Toyota

// Example 2: Inheritance
class ElectricCar extends Car {
    public $batteryLife;
    public function __construct($brand, $batteryLife) {
        parent::__construct($brand);
        $this->batteryLife = $batteryLife;
    }
}
$tesla = new ElectricCar("Tesla", "300 miles");
echo $tesla->getBrand() . " - " . $tesla->batteryLife;

// Example 3: Static methods
class MathOperations {
    public static function add($a, $b) {
        return $a + $b;
    }
}
echo MathOperations::add(5, 3); // Output: 8
?>
```

## 9. Database Interaction

### 9.1 MySQL Database Operations
```php
<?php
// Example 1: Connecting to a database
$conn = new mysqli("localhost", "username", "password", "database");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example 2: Inserting data
$sql = "INSERT INTO users (name, email) VALUES ('John Doe', 'john@example.com')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
}

// Example 3: Selecting data
$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
}
$conn->close();
?>
```

## 10. Error Handling

### 10.1 Exception Handling
```php
<?php
// Example 1: Try-catch block
try {
    $result = 10 / 0;
} catch (DivisionByZeroError $e) {
    echo "Error: " . $e->getMessage();
}

// Example 2: Custom exception
class CustomException extends Exception {}
try {
    throw new CustomException("This is a custom exception");
} catch (CustomException $e) {
    echo "Caught exception: " . $e->getMessage();
}

// Example 3: Finally block
try {
    // Some code that might throw an exception
} catch (Exception $e) {
    echo "Caught exception: " . $e->getMessage();
} finally {
    echo "This will always execute";
}
?>
```

This coursework covers the fundamental concepts of PHP, including basic syntax, variables, control structures, functions, arrays, form handling, file operations, object-oriented programming, database interaction, and error handling. Each concept is explained with at least three examples to reinforce understanding.
