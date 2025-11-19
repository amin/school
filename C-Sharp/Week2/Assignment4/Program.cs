void MathTraining()
{
    Console.WriteLine("Please input the value for X: ");
    var xInput = int.TryParse(Console.ReadLine(), out var x);
    
    Console.WriteLine("Please input the value for Y: ");
    var yInput = int.TryParse(Console.ReadLine(), out var y);
    
    Console.WriteLine($"What is the sum of {x} + {y}? ");
    var sumInput = int.TryParse(Console.ReadLine(), out var sum);

    if (sum == x+y)
    {
        Console.WriteLine($"{sum} is correct!");
    }
    
}

MathTraining();