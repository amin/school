using Assignment3;

var megatron = new Robot("Megatron", 10);
var optimus = new Robot("Optimus Prime", 10);

var game = new RobotFightingGame(megatron, optimus);

while (!game.GameOver)
{
    game.NextRound();
}

if (game.Winner == null)
{
    Console.WriteLine("The game ends in a draw! What a disappointment!");
}
else
{
    Console.WriteLine($"{game.Winner.Name} is the winner!");
}