// See https://aka.ms/new-console-template for more information

int FindDuplicateNumber(int[] numbers)
{
    List<int> duplicateList = new List<int>();
    
    for(var i = 0; i < numbers.Length; i++)
    {
        if (duplicateList.Contains(numbers[i]))
        {
            return numbers[i];
        }
        duplicateList.Add(numbers[i]);
    }

    return -1;
}

var number = FindDuplicateNumber(new[] { 2, 14, 95, 95, 8, 20, 14, 7, 3 });

Console.WriteLine(number);  // 14