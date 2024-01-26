<?php

/*

1. Single Responsibility Principle (SRP). Each class has a single responsibility.

2. Open/Closed Principle (OCP), The code is open for extension and closed for modification:
New types of prototypes can be added without modifying existing code.
For instance, if a new type of prototype needs to be added, a new class can be created implementing the 
Prototype interface without changing the existing code.
This design allows for easy scalability and addition of new functionality without altering existing code.

3. Liskov Substitution Principle (LSP), The code adheres to the LSP as objects of the ConcretePrototype 
class can be substituted for objects of the Prototype interface without affecting the behavior of the program.
Clients can interact with prototypes through the interface without needing to know the specifics of the implementation.
This promotes flexibility and allows for interchangeable use of prototypes, in line with the LSP.

4. Interface Segregation Principle (ISP), The Prototype interface is focused and contains only the method relevant to cloning.
Clients depend only on the method they need from the interface, without being forced to implement or use unnecessary methods.
This promotes flexibility and decouples the client code from specific implementations, adhering to the ISP.

5. Dependency Inversion Principle (DIP), High-level modules (e.g., Client) depend on abstractions (e.g., Prototype interface), 
not concrete implementations.
This allows for flexibility and easy substitution of different types of prototypes without affecting client code.
The use of interfaces promotes loose coupling and facilitates testing and maintainability, in line with the DIP.


*/

// Prototype interface
interface Prototype {
    public function clone(): Prototype;
}

// Concrete Prototype class
class ConcretePrototype implements Prototype {
    private $property;

    public function __construct($property) {
        $this->property = $property;
    }

    public function clone(): Prototype {
        return new self($this->property);
    }

    public function getProperty() {
        return $this->property;
    }
}

// Client code using the prototype
class Client {
    public function createCopy(Prototype $prototype) {
        return $prototype->clone();
    }
}

// Usage example
$originalPrototype = new ConcretePrototype("Original Property");

$client = new Client();
$clone = $client->createCopy($originalPrototype);

echo "Original Property: " . $originalPrototype->getProperty() . "\n";
echo "Cloned Property: " . $clone->getProperty() . "\n";
