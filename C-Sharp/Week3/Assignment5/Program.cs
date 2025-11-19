// See https://aka.ms/new-console-template for more information

Console.Write("What is your name? ");
string name = Console.ReadLine();

void printName(string name)
{
    Console.WriteLine(name);
    foreach(var c in name)
    {
        for (var i = 0; i <= 5; i++) {
          Console.Write(Char.ToUpper(c));
        }

        Console.WriteLine("");
    }
}

printName(name);