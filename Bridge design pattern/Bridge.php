<?php

/*

1. Single Responsibility Principle (SRP). Each class has a single responsibility.

2. Open/Closed Principle (OCP), The code is open for extension and closed for modification:
New shapes or drawing implementations can be added without modifying existing code.
For instance, if a new type of shape or drawing API needs to be added, new classes can be created without changing the existing code.
This design allows for easy scalability and addition of new functionality without altering existing code.

3. Liskov Substitution Principle (LSP), The code adheres to the LSP as objects of the Circle and 
Square classes can be substituted for objects of the Shape interface without affecting the behavior of the program.
Clients can interact with Circle and Square objects through the Shape interface without needing to know the 
specifics of the implementation.
This promotes flexibility and allows for interchangeable use of shapes, in line with the LSP.

4. Interface Segregation Principle (ISP), The Shape and DrawingAPI interfaces are focused and contain only 
the methods relevant to their specific responsibilities.
Clients depend only on the methods they need from these interfaces, without being forced to implement or use unnecessary methods.
This promotes flexibility and decouples the client code from specific implementations, adhering to the ISP.

5. Dependency Inversion Principle (DIP), High-level modules (e.g., Circle, Square) depend on abstractions 
(e.g., Shape, DrawingAPI interfaces), not concrete implementations.
This allows for flexibility and easy substitution of different types of shapes and drawing implementations 
without affecting client code.
The use of interfaces and dependency injection promotes loose coupling and facilitates testing and maintainability, 
in line with the DIP.

*/

// Abstraction interface
interface Shape
{
    public function draw();
}

// Refined Abstraction classes
class Circle implements Shape
{
    protected $implementation;

    public function __construct(DrawingAPI $implementation)
    {
        $this->implementation = $implementation;
    }

    public function draw()
    {
        return "Circle drawn using " . $this->implementation->draw();
    }
}

class Square implements Shape
{
    protected $implementation;

    public function __construct(DrawingAPI $implementation)
    {
        $this->implementation = $implementation;
    }

    public function draw()
    {
        return "Square drawn using " . $this->implementation->draw();
    }
}

// Implementor interface
interface DrawingAPI
{
    public function draw();
}

// Concrete Implementor classes
class DrawingAPI1 implements DrawingAPI
{
    public function draw()
    {
        return "DrawingAPI1";
    }
}

class DrawingAPI2 implements DrawingAPI
{
    public function draw()
    {
        return "DrawingAPI2";
    }
}


// Usage example
$drawingAPI1 = new DrawingAPI1();
$drawingAPI2 = new DrawingAPI2();

$circle = new Circle($drawingAPI1);
$square = new Square($drawingAPI2);

echo $circle->draw() . "\n";
echo $square->draw() . "\n";
