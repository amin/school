var ticketPrices = new Dictionary<string, int>
{
    ["A"] = 33,
    ["B"] = 40,
    ["C"] = 60
};

Console.WriteLine("Welcome to NG Ticket Master!");
Console.Write("Please type your email: ");
var email = Console.ReadLine()?.ToLower() ?? "";

var hasDiscount = email.EndsWith("@yrgo.com");
if (hasDiscount)
{
    Console.WriteLine("A 20% discount will be applied at checkout!");
}

while (true)
{
    Console.WriteLine("\nWhich ticket would you like?");
    Console.Write("Type A, B, or C: ");
    var selection = Console.ReadLine()?.ToUpper();

    if (selection is not ("A" or "B" or "C"))
    {
        Console.WriteLine("I'm sorry, that's not a valid ticket.");
        continue;
    }

    double price = ticketPrices[selection];
    var isVip = false;

    if (selection == "C")
    {
        isVip = PromptForVip();
        if (isVip) price += 20;
    }

    if (hasDiscount)
    {
        price *= 0.8;
    }

    var ticketType = isVip ? $"{selection}+VIP" : $"{selection} ticket";
    Console.WriteLine($"You have selected {ticketType} for ${price:F2}.");
    break;
}

bool PromptForVip()
{
    while (true)
    {
        Console.WriteLine("Would you like our special VIP package with that? +$20");
        Console.Write("Type yes or no: ");
        var answer = Console.ReadLine()?.ToUpper();

        if (answer == "YES") return true;
        if (answer == "NO") return false;
    }
}