namespace Assignment4;

public class Star
{
    private readonly Random _random = new Random();
    
    private int _x;
    private int Y;
xx
    public Star()
    {
        this.X = this._random.Next(0, _WindowWidth);
        this.Y = this._random.Next(0, _WindowHeight);
        Console.SetCursorPosition(this.X, this.Y);
    }
    public void Move()
    {

        
        Console.WriteLine('X');
        Thread.Sleep(10);
    }
}