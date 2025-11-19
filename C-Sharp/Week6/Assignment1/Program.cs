// See https://aka.ms/new-console-template for more information

int[] input =  [6, 1, 4, 5, 2, 8];

int ThresholdSum(int[] input, int threshold)
{
    int sum = 0;
    
    for (var i = 0; i < input.Length; i++)
    {
        if (input[i] > threshold)
        {
            sum += input[i];
        }
    }

    return sum;
}

var output = ThresholdSum(input, 4);  // 6 + 5 + 8

Console.WriteLine(output); // 19