// See https://aka.ms/new-console-template for more information

String GetLongestString(string[] names)
{

    var longestName = "";
    
    for (var i = 0; i < names.Length; i++)
    {
        if (names[i].Length > longestName.Length)
        {
            longestName = names[i];
        }
    }

    return longestName;
}

var names = new []
{
    "Egon Spengler",
    "Peter Venkman",
    "Ray Stantz",
    "Winston Zeddemore",
};

var output = GetLongestString(names);

Console.WriteLine(output);