using Assignment1;

Stack<int> GetChangeForCustomer(int price, int pay)
{
    var change = pay - price;
    Stack<int> stack = new Stack<int>();
    
    int[] bills = [500, 200, 100, 50, 20, 10, 5, 2, 1];
    
    while (change > 0)
    {
        foreach (var bill in bills)
        {
            if (bill > change) continue;
            change -= bill;
            stack.Push(bill);
            break;
        }
    }
    
    return stack;
}

var change = GetChangeForCustomer(price: 501, pay: 1000);

Console.WriteLine(String.Join(", ", change.OrderByDescending(x => x)));