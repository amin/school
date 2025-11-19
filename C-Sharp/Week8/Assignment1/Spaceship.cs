namespace Assignment1;

public class Spaceship
{
    public string Name { get; }
    private int _size;

    private Stack<Cargo> _storage = new Stack<Cargo>();

    public Spaceship(string name, int size)
    {
        Name = name;
        _size = size;
    }

    public bool AddCargo(Cargo? item)
    {
        if (_size - item.Size < 0)
        {
            return false;
        }

        _size -= item.Size;
        _storage.Push(item);
        return true;
    }

    public void ListCargo()
    {

        if (_storage.Count() == 0)
        {
            Console.WriteLine("<EMPTY>");
            return;
        }
        
        foreach (var cargo in _storage)
        {
            Console.WriteLine($"* {cargo.Description}");
        }
    }

    public Cargo? RemoveCargo()
    {
        if (_storage.Count() == 0)
        {
            return null;
        }

        return _storage.Pop();
    }

    public bool MoveCargoTo(Spaceship spaceship)
    {
        for (var i = 0; i < _storage.Count(); i++)
        {
            var cargo = RemoveCargo();
            if (cargo == null)
            {
                return false;
            }

            spaceship.AddCargo(cargo);
        }
        return true;
    }
}