namespace Assignment5;

public class Box
{
    public int X { get; set; }
    public int Y { get; set; }
    public int Height { get; set; }
    public int Width { get; set; }

    public void Draw(System.ConsoleColor color)
    {
        Console.ForegroundColor = color;
        for (var i = 0; i < this.Height; i++)
        {
            for (var j = 0; j < this.Width; j++)
            {
                Console.SetCursorPosition(this.X + j, this.Y + i);
                Console.WriteLine("X");
            }
        }
    }
}