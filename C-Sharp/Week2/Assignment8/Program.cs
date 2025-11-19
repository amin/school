void CalculateWidthAndHeight(double area, double x, double y)
{
    var totalPixelArea = x * y;
    
    var areaSquare = Math.Sqrt(area);
    var pixelSquare = Math.Sqrt(totalPixelArea);
    var mPerPixel = areaSquare / pixelSquare;
    

    Console.WriteLine($"Width = {x * mPerPixel:F2}m");
    Console.WriteLine($"Height = {y * mPerPixel:F2}m");
}

CalculateWidthAndHeight(3, 200, 120);