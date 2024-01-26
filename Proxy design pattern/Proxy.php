<?php

/*

1. Single Responsibility Principle (SRP). Each class has a single responsibility.

2. Open/Closed Principle (OCP), The code is open for extension and closed for modification:
New types of subjects or proxies can be added without modifying existing code.
For instance, if a new type of subject or proxy needs to be added, new classes can be created without changing the existing code.
This design allows for easy scalability and addition of new functionality without altering existing code.

3. Liskov Substitution Principle (LSP), The code adheres to the LSP as objects of the RealSubject and 
Proxy classes can be substituted for objects of the Subject interface without affecting the behavior of the program.
Clients can interact with subjects and proxies through the interface without needing to know the specifics of the implementation.
This promotes flexibility and allows for interchangeable use of subjects and proxies, in line with the LSP.

4. Interface Segregation Principle (ISP), The Subject interface is focused and contains only the method relevant to making a request.
Clients depend only on the method they need from the interface, without being forced to implement or use unnecessary methods.
This promotes flexibility and decouples the client code from specific implementations, adhering to the ISP.

5. Dependency Inversion Principle (DIP), High-level modules (e.g., Proxy) depend on abstractions (e.g., Subject interface), 
not concrete implementations.
This allows for flexibility and easy substitution of different types of subjects and proxies without affecting client code.
The use of interfaces promotes loose coupling and facilitates testing and maintainability, in line with the DIP.


*/

// Subject interface
interface Subject {
    public function request(): void;
}

// RealSubject class
class RealSubject implements Subject {
    public function request(): void {
        echo "RealSubject: Handling request.\n";
    }
}

// Proxy class
class Proxy implements Subject {
    private $realSubject;

    public function __construct(RealSubject $realSubject) {
        $this->realSubject = $realSubject;
    }

    public function request(): void {
        $this->preRequest();
        $this->realSubject->request();
        $this->postRequest();
    }

    private function preRequest(): void {
        echo "Proxy: Performing pre-request tasks.\n";
    }

    private function postRequest(): void {
        echo "Proxy: Performing post-request tasks.\n";
    }
}

// Client's code
$realSubject = new RealSubject();
$proxy = new Proxy($realSubject);

// Now Client is interacting with the Proxy request
$proxy->request();


