namespace Assignment7;

public class ScreenSaver
{
    private readonly int _windowWidth = Console.WindowWidth;
    private readonly int _windowHeight = Console.WindowHeight;
    private readonly Random _random = new Random();
    
    public void Start()
    {
        while (true)
        {
            Console.BackgroundColor = (ConsoleColor)this._random.Next(1, 16);
            
            int randomHeight = this._random.Next(1, _windowHeight);
            int randomWidth = this._random.Next(1, _windowWidth);

            DrawBox(randomWidth, randomHeight);

            Thread.Sleep(250);
        }
    }

    private void DrawBox(int boxWidth, int boxHeight)
    {
        int startX = this._random.Next(0, _windowWidth - boxWidth);
        int startY = this._random.Next(0, _windowHeight - boxHeight);

        for (int i = 0; i < boxHeight; i++)
        {
            Console.SetCursorPosition(startX, startY + i);
            Console.Write(new string(' ', boxWidth));
        }
    }
}