<?php

/*
1. Single Responsibility Principle (SRP). Each class has a single responsibility.

2. Open/Closed Principle (OCP), The code is open for extension and closed for modification:
New adapters can be added to adapt different functionalities without modifying existing code.
For instance, if a new type of functionality needs to be adapted to the Target interface, 
a new adapter class can be created without changing the existing code.
This design allows for easy scalability and addition of new functionality without altering existing code.

3. Liskov Substitution Principle (LSP), The code adheres to the LSP as objects of the 
Adapter class can be substituted for objects of the Target interface without affecting the behavior of the program.
Clients can interact with the Adapter class through the Target interface without needing to know the specifics of the adaptation.
This promotes flexibility and allows for interchangeable use of adapters, in line with the LSP.

4. Interface Segregation Principle (ISP), The Target interface is focused and contains 
only the method relevant to the client's needs (request()).
Clients (Client class) depend only on the methods they need from the Target interface, 
without being forced to implement or use unnecessary methods.
This promotes flexibility and decouples the client code from specific implementations, adhering to the ISP.

5. Dependency Inversion Principle (DIP), High-level modules like client depends on abstractions (e.g., Target interface), 
not concrete implementations.
This allows for flexibility and easy substitution of different types of adapters without affecting client code.
The use of interfaces and dependency injection promotes loose coupling and facilitates testing and maintainability, 
in line with the DIP.

*/

// Target interface
interface Target {
    public function request();
}

// Adaptee (existing class)
class Adaptee {
    public function specificRequest() {
        return "Adaptee's specific request";
    }
}

// Adapter class (implements Target)
class Adapter implements Target {
    private $adaptee;

    public function __construct(Adaptee $adaptee) {
        $this->adaptee = $adaptee;
    }

    public function request() {
        return $this->adaptee->specificRequest();
    }
}


// Client code using the adapter
class Client {
    public function executeRequest(Target $target) {
        return $target->request();
    }
}

// Usage example
$adaptee = new Adaptee();
$adapter = new Adapter($adaptee);

$client = new Client();
$result = $client->executeRequest($adapter);

echo $result . "\n";
