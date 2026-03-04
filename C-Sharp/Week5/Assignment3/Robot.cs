namespace Assignment3;

public class Robot
{
    public string Name;
    public int Health;

    public Robot(string name, int health)
    {
        this.Name = name;
        this.Health = health;
    }

    public void Attack(Robot robot)
    {
        int roll = Die.Roll();
        robot.Health -= roll;
        Console.WriteLine($"{this.Name} attacks Optimus {robot.Name} with {roll} damage!");
    }
}