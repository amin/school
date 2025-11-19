// See https://aka.ms/new-console-template for more information
using System.Linq;

var A = 50;
var B = 45;
var C = 90;

List<int> cart = [A, B, C];
var price = cart.Sum() - cart.Min();

Console.WriteLine($"Your total is ${price}");