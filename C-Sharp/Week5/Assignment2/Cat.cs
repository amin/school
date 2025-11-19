namespace Assignment2;

public class Cat
{
    public readonly string Name;
    public bool Zombie;
    public Cat(string name, bool zombie)
    {
        this.Name = name;
        this.Zombie = zombie;
    }
    public string Speak()
    {
        return !this.Zombie ? "Meow!" : "Braaaains!";
    }

    public void Eat(Cat cat)
    {
        if (this.Zombie && cat.Zombie)
        {
            return;
        }
        
        if (!this.Zombie)
        {
            Console.WriteLine($"What?! I will not eat {cat.Name}!");
            return;
        }
        
        Console.WriteLine("Nom nom nom!");
        cat.Zombie = true;
    }
}