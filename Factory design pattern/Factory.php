<?php

/*

1. Single Responsibility Principle (SRP). Each class has a single responsibility.

2. Open/Closed Principle (OCP), The code is open for extension and closed for modification.
New types of products or factories can be added without modifying existing code.
For instance, if a new type of product or factory needs to be added, new classes can be created without changing the existing code.
This design allows for easy scalability and addition of new functionality without altering existing code.

3. Liskov Substitution Principle (LSP), The code adheres to the LSP as objects of the ConcreteProductA, ConcreteProductB, ConcreteFactoryA, and ConcreteFactoryB classes can be substituted for objects of the Product and Factory interfaces without affecting the behavior of the program.
Clients can interact with products and factories through the interfaces without needing to know the specifics of the implementation.
This promotes flexibility and allows for interchangeable use of products and factories, in line with the LSP.

4. Interface Segregation Principle (ISP), The Product and Factory interfaces are focused and contain only 
the methods relevant to their specific responsibilities.
Clients depend only on the methods they need from these interfaces, without being forced to implement or use unnecessary methods.
This promotes flexibility and decouples the client code from specific implementations, adhering to the ISP.

5. Dependency Inversion Principle (DIP), High-level modules (e.g., Client) depend on abstractions (e.g., Factory interface), 
not concrete implementations.
This allows for flexibility and easy substitution of different types of factories without affecting client code.
The use of interfaces promotes loose coupling and facilitates testing and maintainability, in line with the DIP.

*/

// Product interface representing the objects to be created
interface Product
{
    public function getName();
}

// ConcreteProduct classes implementing the Product interface
class ConcreteProductA implements Product
{
    public function getName()
    {
        return "Product A";
    }
}

class ConcreteProductB implements Product
{
    public function getName()
    {
        return "Product B";
    }
}

// Factory interface defining a method to create products
interface Factory
{
    public function createProduct(): Product;
}

// ConcreteFactory classes implementing the Factory interface
class ConcreteFactoryA implements Factory
{
    public function createProduct(): Product
    {
        return new ConcreteProductA();
    }
}

class ConcreteFactoryB implements Factory
{
    public function createProduct(): Product
    {
        return new ConcreteProductB();
    }
}


// Client code using the factory to create products
class Client
{
    public function run(Factory $factory)
    {
        $product = $factory->createProduct();
        echo "Created product: " . $product->getName() . "\n";
    }
}


// Usage example
$client = new Client();

// Dependency injection of ConcreteFactoryA
$client->run(new ConcreteFactoryA());

// Dependency injection of ConcreteFactoryB
$client->run(new ConcreteFactoryB());
