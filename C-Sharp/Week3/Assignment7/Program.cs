void GenerateChristmasTree(int lines)
{
    for (var i = 0; i < lines; i++)
    {
        Console.Write(new string(' ', lines - i));
        Console.ForegroundColor = ConsoleColor.Green;
        Console.WriteLine(new string('*', i * 2 + 1));
        if (i == lines - 1)
        {
            Console.Write(new string(' ', i));
            Console.ForegroundColor = ConsoleColor.DarkYellow;
            Console.WriteLine("[|]");
        }
    }
}

Console.Write("Please input the size of your Christmas tree: ");
int.TryParse(Console.ReadLine(), out var linesInput);

GenerateChristmasTree(linesInput);

Console.ForegroundColor = ConsoleColor.Green;