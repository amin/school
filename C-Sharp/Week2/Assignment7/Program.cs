void XYColumns(int x, int y)
{

    for (var i = 0; i < x; i++)
    {
        for (var j = 0 + i; j < y * x; j+=x)
        {
            Console.Write($"{j:D2} ");
        }

        Console.WriteLine();
    }
}

XYColumns(5, 10);