// See https://aka.ms/new-console-template for more information

string Normalize(string input)
{
    if(!String.IsNullOrEmpty(input)) {
        return char.ToUpper(input[0]) + input.Substring(1).ToLower();
    }

    return "";
}

var firstname = Normalize("GUYBRUSH");
var lastname = Normalize("threepwood");

Console.WriteLine($"{firstname} + {lastname}");