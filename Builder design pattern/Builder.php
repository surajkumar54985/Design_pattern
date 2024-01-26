<?php

/*

1. Single Responsibility Principle (SRP). Each class has a single responsibility.

2. Open/Closed Principle (OCP). In the design Director class allows to orchestrate the construction process using a builder, 
allowing the addition of new builders without modifying the existing code.

3. Liskov Substitution Principle (LSP). Since there is no subclasses directly created, but still here,
the ConcreteBuilder class can be substituted for the Builder interface without affecting the behavior of the system.

4. The Interface Segregation Principle (ISP) is about keeping those methods only inside interfaces which will be always used, 
it should not have any method that stays unused if we create a class with that interface.
In the code, the Builder interface has just the right methods for building parts of a product. 
It doesn't have any unnecessary methods that would not be used if we create an object of ConcreteBuilder.
So, the code follows the ISP because the interface is well-designed and focused on its specific purpose.

5. Dependency Inversion Principle (DIP). High-level modules (Client, Director) should not depend on low-level modules 
(ConcreteFactoryA, ConcreteFactoryB), but both depends on abstractions like (Builder interface) rather than concrete implementations (ConcreteBuilder).

*/

// Product class representing the object to be constructed
class Product
{
    private $parts = [];

    public function addPart($part)
    {
        $this->parts[] = $part;
    }

    public function listParts()
    {
        return implode(', ', $this->parts);
    }
}

// Builder interface defining the steps to build the product
interface Builder
{
    public function buildPartA();

    public function buildPartB();

    public function getResult(): Product;
}

// ConcreteBuilder class implementing the Builder interface
class ConcreteBuilder implements Builder
{
    private $product;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->product = new Product();
    }

    public function buildPartA()
    {
        $this->product->addPart("Part A");
    }

    public function buildPartB()
    {
        $this->product->addPart("Part B");
    }

    public function getResult(): Product
    {
        $result = $this->product;
        $this->reset();
        return $result;
    }
}

// Director class that orchestrates the construction using a Builder
class Director
{
    public function construct(Builder $builder)
    {
        $builder->buildPartA();
        $builder->buildPartB();
    }
}


// Client code using the builder to construct products
class Client
{
    public function buildProduct(Builder $builder)
    {
        $director = new Director();
        $director->construct($builder);
        $product = $builder->getResult();
        echo "Product parts: " . $product->listParts();
    }
}

// Usage example
$client = new Client();
$builder = new ConcreteBuilder();

$client->buildProduct($builder);
