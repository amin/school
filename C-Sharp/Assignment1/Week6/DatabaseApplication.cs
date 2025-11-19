namespace Week6;

public class DatabaseApplication
{

    private readonly string _fileName = "/tmp/database.txt";

    public void Load()
    {
        if (File.Exists(_fileName))
        {
            Database = File.ReadAllLines(_fileName).ToList();
        }
    }

    public void Save()
    {
        File.WriteAllLines(_fileName, Database);
    }
    public List<string> Database { get; set; } = new List<string>();
    public List<string> Commands { get; } = new List<string>
    {
        "add",
        "help",
        "list",
        "delete",
        "quit"
    };

    public void Run()
    {
        Console.WriteLine();
        Console.BackgroundColor = ConsoleColor.Black;
        Console.ForegroundColor = ConsoleColor.Cyan;
        Console.WriteLine("*** Welcome to Initech Data Systems 1.3.37-alpha ***");
        Console.WriteLine();
        Console.ResetColor();
        Load();
        
        string command;

        do
        {
            command = GetCommand();

            if (command == "add")
            {
                Console.Write("Please input company name to add: ");
                var company = Console.ReadLine()?.ToUpper();
                if (company?.Length == 0 || company == null)
                {
                    Console.WriteLine("Company name cannot be empty");
                    continue;
                }

                if (Database.Contains(company))
                {
                    Console.WriteLine($"{company} already exists in the database");
                    continue;
                }

                Database.Add(company);
                Save();
                Console.WriteLine($"{company} added to the database");
            }
            else if (command == "help")
            {
                Console.WriteLine("-- Available commands --");
                
                foreach (var item in Commands)
                {
                    if (item == "help") continue;
                    Console.WriteLine(item);
                }
            }
            else if (command == "list")
            {
                foreach (var company in Database)
                {
                    Console.WriteLine(company);
                }

                Console.WriteLine("----");
                Console.WriteLine($"Companies in database: {Database.Count()}");

            }
            else if (command == "delete")
            {
                Console.Write("Please input company name to delete: ");
                var company = Console.ReadLine()?.ToUpper();
                if (company?.Length == 0 || company == null)
                {
                    Console.WriteLine("Company name cannot be empty");
                    continue;
                }

                if (!Database.Contains(company))
                {
                    Console.WriteLine($"{company} cannot be found in the database");
                    continue;
                }
                Database.Remove(company);
                Save();
                Console.WriteLine($"{company} removed from the database");
                continue;
            }

        } while (command != "quit");
    }

    public string GetCommand()
    {
        while (true)
        {
            Console.Write("Please input a command, or \"help\": ");

            var input = Console.ReadLine()!;

            if (Commands.Contains(input))
            {
                Console.ForegroundColor = ConsoleColor.Green;
                Console.WriteLine("OK");
                Console.WriteLine();
                Console.ResetColor();

                return input;
            }

            Console.WriteLine("?");
            Console.WriteLine();
        }
    }
}