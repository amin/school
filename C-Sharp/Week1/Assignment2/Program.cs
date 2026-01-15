// See https://aka.ms/new-console-template for more information

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
        var price = ticketPrices[input];
        var isVip = false;
        if (input == "C")
        {

            while (true)
            {
                Console.WriteLine("Would you like our special VIP package with that? +$20");
                Console.WriteLine("Type yes or no: ");
                
                var answer = Console.ReadLine()?.ToUpper();
                if (answer == "YES")
                {
                    price += 20;
                    isVip = true;
                    break;
                }

                if (answer == "NO")
                {
                    break;
                }
            }
        }

        if (isVip)
        {
            Console.WriteLine($"You have selected {input}+VIP, your total is ${price}.");
        }
        
        if (!isVip)
        {
            Console.WriteLine($"You have selected {input} ticket for ${price}.");
        }
        break;
    }
    
    Console.WriteLine("\nI'm sorry, that's not a valid ticket.");
}