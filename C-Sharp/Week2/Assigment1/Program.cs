// See https://aka.ms/new-console-template for more information


double GetAverage(double a, double b, double c)
{
    return (a + b + c) / 3;
}

var average = GetAverage(5, 10, 7.4);
Console.WriteLine($"Average: {average:F2}");