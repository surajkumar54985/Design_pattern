<?php

/*

1. Single Responsibility Principle (SRP). Each class has a single responsibility.

2. Open/Closed Principle (OCP), The code is open for extension and closed for modification:
The singleton pattern allows for the creation of a single instance of the Singleton class, 
which can be accessed by clients without the need to modify the class.
Clients can use the singleton instance without altering its implementation.
This design allows for easy scalability and addition of new functionality without altering existing code.

3. Liskov Substitution Principle (LSP), The code adheres to the LSP as objects of the Singleton class can be substituted 
for objects of the SingletonInterface interface without affecting the behavior of the program.
Clients can interact with the singleton instance through the interface without needing to know the specifics of the implementation.
This promotes flexibility and allows for interchangeable use of singleton instances, in line with the LSP.

4. Interface Segregation Principle (ISP), The SingletonInterface interface is focused and contains only 
the method relevant to showing a message.
Clients depend only on the method they need from the interface, without being forced to implement or use unnecessary methods.
This promotes flexibility and decouples the client code from specific implementations, adhering to the ISP.

5. Dependency Inversion Principle (DIP), High-level modules (e.g., SingletonClient) depend on abstractions 
(e.g., SingletonInterface interface), not concrete implementations.
This allows for flexibility and easy substitution of different types of singleton instances without affecting client code.
The use of interfaces promotes loose coupling and facilitates testing and maintainability, in line with the DIP.

*/

interface SingletonInterface
{
    public function showMessage();
}

class Singleton implements SingletonInterface
{
    private static $instance;

    private function __construct()
    {
        // We can keep initialization code, if any
    }

    public static function getInstance(): SingletonInterface
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function showMessage()
    {
        echo "Hello from Singleton!\n";
    }
}

class SingletonClient
{
    private $singleton;

    public function __construct(SingletonInterface $singleton)
    {
        $this->singleton = $singleton;
    }

    public function run()
    {
        $this->singleton->showMessage();
    }
}

// Usage
$singletonInstance = Singleton::getInstance();

$client1 = new SingletonClient($singletonInstance);
$client1->run();

$singletonInstanceClone = Singleton::getInstance();

$client2 = new SingletonClient($singletonInstanceClone);
$client2->run();

// Checking if both the clients are using the same instance
if ($singletonInstance === $singletonInstanceClone) {
    echo "Both instances are the same.";
} else {
    echo "Instances are different.";
}
