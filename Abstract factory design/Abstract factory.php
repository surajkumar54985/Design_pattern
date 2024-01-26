<?php

/*
1. Single Responsibility Principle (SRP). Each class has a single responsibility.
2. Open/Closed Principle (OCP), The code is open for extension and closed for modification.
New types of buttons or GUI factories can be added without modifying existing code.
For instance, to add a new type of button or GUI factory, one would create new classes implementing the necessary interfaces.
This design allows for easy scalability and addition of new functionality without altering existing code.

3. Liskov Substitution Principle (LSP), While the code implements interfaces and abstracts the creation of buttons and factories, 
it does not strictly adhere to the LSP.
Substituting objects of one subclass with another could potentially lead to platform-specific rendering issues or errors.
Ensuring true substitutability without affecting program correctness may require a more uniform approach to platform-specific behavior.

4. Interface Segregation Principle (ISP), The interfaces (Button, GUIFactory) 
are focused and contain only the methods relevant to their specific responsibilities.
Clients (Client class) depend only on the methods they need, without being forced to implement or use unnecessary ones.
This promotes flexibility and decouples the client code from specific implementations, adhering to the ISP.

5. Dependency Inversion Principle (DIP), High-level modules (e.g., Client) depend on abstractions (e.g., GUIFactory interface), 
not concrete implementations.
This allows for flexibility and easy substitution of different types of factories or buttons without affecting client code.
The use of interfaces and dependency injection promotes loose coupling and facilitates testing and maintainability, 
in line with the DIP.

*/

// Abstract product interface
interface Button
{
    public function render();
}

// Concrete product classes
class WindowsButton implements Button
{
    public function render()
    {
        return "Rendering a Windows button\n";
    }
}

class MacOSButton implements Button
{
    public function render()
    {
        return "Rendering a MacOS button\n";
    }
}

// Abstract factory interface
interface GUIFactory
{
    public function createButton(): Button;
}

// Concrete factory classes
class WindowsFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new WindowsButton();
    }
}

class MacOSFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new MacOSButton();
    }
}


// Client code using the abstract factory to create products
class Client
{
    private $factory;

    public function __construct(GUIFactory $factory)
    {
        $this->factory = $factory;
    }

    public function createButton()
    {
        $button = $this->factory->createButton();
        echo $button->render();
    }
}

// Usage example
$windowsFactory = new WindowsFactory();
$macOSFactory = new MacOSFactory();

$clientForWindows = new Client($windowsFactory);
$clientForWindows->createButton();

$clientForMacOS = new Client($macOSFactory);
$clientForMacOS->createButton();
