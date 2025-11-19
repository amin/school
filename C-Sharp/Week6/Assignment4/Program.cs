// See https://aka.ms/new-console-template for more information

var map = File.ReadAllLines("map.txt");

int CalculateLand(string[] map)
{
    int landCount = 0;
    for (var i = 0; i < map.Length; i++)
    {
        for(var j = 0; j < map[i].Length; j++)
        {
            if (map[i][j] == '#')
            {
                landCount++;
            }
        }
    }

    return landCount;
}

Console.WriteLine(CalculateLand(map));