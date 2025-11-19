int SumAllDigits(string input)
{
    var sum = 0;
    
    foreach (var c in input)
    {
        if (char.IsDigit(c))
        {
            sum += c - 48;
        }
    }

    return sum;
}


var input = "4719";
var value = SumAllDigits(input);

Console.WriteLine($"Sum of {input} = {value}");