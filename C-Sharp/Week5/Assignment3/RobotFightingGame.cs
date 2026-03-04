namespace Assignment3;

public class RobotFightingGame
{
    public bool GameOver = false;
    
    public Robot RobotOne;
    public Robot RobotTwo;
    public Robot LastAttacker;
    public Robot Winner;

    public RobotFightingGame(Robot robotOne, Robot robotTwo)
    {
        this.RobotOne = robotOne;
        this.RobotTwo = robotTwo;

        this.LastAttacker = this.RobotTwo;
    }

    private void CheckWinner()
    {
        if (this.RobotOne.Health <= 0 && this.RobotTwo.Health <= 0)
        {
            this.Winner = null;
            this.GameOver = true;
        }
        
        else if (this.RobotOne.Health > 0 && this.RobotTwo.Health <= 0)
        {
            this.Winner = this.RobotOne;
            this.GameOver = true;
        }
        
        else if (this.RobotTwo.Health > 0 && this.RobotOne.Health <= 0)
        {
            this.Winner = this.RobotTwo;
            this.GameOver = true;
        }


    }

    public void NextRound()
    {
        
        if (this.LastAttacker == this.RobotTwo)
        {
            this.RobotOne.Attack(this.RobotTwo);
            this.LastAttacker = this.RobotOne;
            return;
        }
        else
        {
            this.RobotTwo.Attack(this.RobotOne);
            this.LastAttacker = this.RobotTwo;  
        }
        
        this.CheckWinner();
    }
}