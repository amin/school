// See https://aka.ms/new-console-template for more information

Dictionary<string, int> ticketPrices = new Dictionary<string, int>();
ticketPrices.Add("A", 33);
ticketPrices.Add("B", 40);
ticketPrices.Add("C", 60);

Console.WriteLine("Welcome to NG Ticket Master!");

while (true)
{
    Console.WriteLine("Which ticket would you like?");
    Console.Write("Type A, B, or C: ");

    var input = Console.ReadLine()?.ToUpper();
    
    if (input == "A" || input == "B" || input == "C")
    {
        Console.WriteLine($"You have selected {input} ticket for ${ticketPrices[input]}.");
        break;
    }
    
    Console.WriteLine("\nI'm sorry, that's not a valid ticket.");
}