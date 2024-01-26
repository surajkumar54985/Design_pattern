<?php

/*

1. Single Responsibility Principle (SRP), Each class has a single responsibility.

2. Open/Closed Principle (OCP), The code is open for extension and closed for modification:
New types of decorators can be added to modify the behavior of coffee without modifying existing code.
For instance, if a new type of decorator needs to be added (e.g., CreamDecorator), 
a new class can be created without changing the existing code.
This design allows for easy scalability and addition of new functionality without altering existing code.

3.Liskov Substitution Principle (LSP), The code adheres to the LSP as objects of the SimpleCoffee, MilkDecorator, 
and SugarDecorator classes can be substituted for objects of the Coffee interface without affecting the behavior of the program.
Clients can interact with different types of coffees through the Coffee interface without 
needing to know the specifics of the implementation.
This promotes flexibility and allows for interchangeable use of different types of coffees, in line with the LSP. 

4. Interface Segregation Principle (ISP), The Coffee interface is focused and contains only the methods relevant to getting the cost and description of coffee.
Clients depend only on the methods they need from the Coffee interface (cost() and description()), without being forced to implement or use unnecessary methods.
This promotes flexibility and decouples the client code from specific implementations, adhering to the ISP.

5. Dependency Inversion Principle (DIP), High-level modules (e.g., Client) depend on abstractions (e.g., Coffee interface), 
not concrete implementations.
This allows for flexibility and easy substitution of different types of coffees and decorators without affecting client code.
The use of interfaces promotes loose coupling and facilitates testing and maintainability, in line with the DIP.

*/

// Component interface
interface Coffee {
    public function cost(): float;
    public function description(): string;
}

// Concrete Component class
class SimpleCoffee implements Coffee {
    public function cost(): float {
        return 5.0;
    }

    public function description(): string {
        return "Simple Coffee";
    }
}

// Decorator interface
interface CoffeeDecorator extends Coffee {
}

// Concrete Decorator class
class MilkDecorator implements CoffeeDecorator {
    private $coffee;

    public function __construct(Coffee $coffee) {
        $this->coffee = $coffee;
    }

    public function cost(): float {
        return $this->coffee->cost() + 2.0;
    }

    public function description(): string {
        return $this->coffee->description() . ", Milk";
    }
}

// Concrete Decorator class
class SugarDecorator implements CoffeeDecorator {
    private $coffee;

    public function __construct(Coffee $coffee) {
        $this->coffee = $coffee;
    }

    public function cost(): float {
        return $this->coffee->cost() + 1.0;
    }

    public function description(): string {
        return $this->coffee->description() . ", Sugar";
    }
}


// Client code using the decorator
class Client {
    public function orderCoffee(Coffee $coffee) {
        echo "Cost: $" . $coffee->cost() . "\n";
        echo "Description: " . $coffee->description() . "\n";
    }
}

// Usage example
$simpleCoffee = new SimpleCoffee();
$milkCoffee = new MilkDecorator($simpleCoffee);
$sugarMilkCoffee = new SugarDecorator($milkCoffee);

$client = new Client();
$client->orderCoffee($sugarMilkCoffee);
