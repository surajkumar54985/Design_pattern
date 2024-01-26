<?php

/* 
1. Single Responsibility Principle (SRP). Each class has a single responsibility.

2. Open/Closed Principle (OCP), The code is open for extension and closed for modification:
New types of graphics or composite structures can be added without modifying existing code.
For instance, if a new type of graphic or composite needs to be added, new classes can be created without changing the existing code.
This design allows for easy scalability and addition of new functionality without altering existing code.

3. Liskov Substitution Principle (LSP), The code adheres to the LSP as objects of the Circle, Square, 
and CompositeGraphic classes can be substituted for objects of the Graphic interface without affecting the behavior of the program.
Clients can interact with individual graphics or composite graphics through the Graphic interface without 
needing to know the specifics of the implementation.
This promotes flexibility and allows for interchangeable use of graphics and composite structures, in line with the LSP.

4. Interface Segregation Principle (ISP), The Graphic interface is focused and contains only the method relevant to drawing graphics.
Clients depend only on the draw() method from the Graphic interface, without being forced to implement or use unnecessary methods.
This promotes flexibility and decouples the client code from specific implementations, adhering to the ISP.

5. Dependency Inversion Principle (DIP), High-level modules (e.g., Client) depend on abstractions (e.g., Graphic interface), 
not concrete implementations.
This allows for flexibility and easy substitution of different types of graphics and composite structures without affecting client code.
The use of interfaces promotes loose coupling and facilitates testing and maintainability, in line with the DIP.

*/


// Component interface
interface Graphic {
    public function draw();
}

// Leaf class (implements Graphic)
class Circle implements Graphic {
    public function draw() {
        echo "Drawing a circle\n";
    }
}

// Leaf class (implements Graphic)
class Square implements Graphic {
    public function draw() {
        echo "Drawing a square\n";
    }
}

// Composite class (implements Graphic)
class CompositeGraphic implements Graphic {
    private $graphics = [];

    public function addGraphic(Graphic $graphic) {
        $this->graphics[] = $graphic;
    }

    public function draw() {
        echo "Drawing a composite graphic:\n";
        foreach ($this->graphics as $graphic) {
            $graphic->draw();
        }
    }
}


// Client code using the composite structure
class Client {
    public function render(Graphic $graphic) {
        $graphic->draw();
    }
}

// Usage example
$circle = new Circle();
$square = new Square();

$composite = new CompositeGraphic();
$composite->addGraphic($circle);
$composite->addGraphic($square);

$client = new Client();
$client->render($composite);
