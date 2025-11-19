namespace Assignment3;

public class Cinema
{
    public Movie Movie { get; set; }
    public string MovieInformation()
    {
        return $"We are currently showing: {Movie.Name} ({Movie.AgeRating} years or older, {Movie.Price}:-)";

    }

    public void ShowMovieTo(Person person)
    {
        person.Money = 
        Console.WriteLine($"Welcome {person.Name}, please enjoy the movie {Movie.Name}!");
    }
}