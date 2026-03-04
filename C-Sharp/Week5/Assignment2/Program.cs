using Assignment2;

var luna = new Cat("Luna", false);
var artemis = new Cat("Artemis", true);

luna.Eat(artemis);
artemis.Eat(luna);

Console.WriteLine($"{luna.Name} says: {luna.Speak()}");
//Console.WriteLine($"{artemis.Name} says: {artemis.Speak()}");   