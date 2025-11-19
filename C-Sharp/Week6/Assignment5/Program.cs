// See https://aka.ms/new-console-template for more information

void printBlock(byte[,] block)
{
    for (int i = 0; i < block.GetLength(0); i++)
    {
 
        for (int j = 0; j < block.GetLength(1); j++)
        {
            Console.Write(block[i, j]);
        }
        Console.WriteLine();
    }
}

byte[,] RotateLeft(byte[,] block)
{
    int rows = block.GetLength(0);
    int cols = block.GetLength(1);
    
    byte[,] newBlock = new byte[cols, rows];

    for (int i = 0; i < rows; i++)
        for (int j = 0; j < cols; j++) {
            newBlock[cols - 1 - j, i] = block[i, j];
        }
    return newBlock;
}

var block = new byte[,] {
    { 0, 0, 0 },
    { 1, 1, 1 },
    { 0, 1, 0 },
};

block = RotateLeft(block);

printBlock(block);
Console.WriteLine("-----");
block = RotateLeft(block);
printBlock(block);
