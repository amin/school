// TODO: Konvertera den här filen till TypeScript (.ts)
// Fixa alla buggar och lägg till korrekta typer!

function addNumbers(a: number, b: string): number {
  return a + Number(b);
}

console.log(addNumbers(5, "10")); // Ska vara 15, inte "510"

type User = {
    firstName: string,
    lastName: string,
    age?: number 
}

function getFullName(user: User) {
  return user.firstName + " " + user.lastName;
}

const user: User = {
  firstName: "Anna",
  lastName: "Svensson",
  age: 28
};

console.log(getFullName(user)); // Ska skriva ut "Anna Svensson"


function multiply(x: number, y: number): number {
  return x * y;
}

console.log(multiply(2,5)); // Ska vara 10


const shoppingCart: CartItem[] = [];

type CartItem = {
    name: string,
    price: number,
    quantity: number
}

const addItem = ({name, price, quantity}: CartItem) => {
  shoppingCart.push({
    name,
    price,
    quantity
  });
}

function getTotalPrice(): number {
  let total = 0;
  for (const item of shoppingCart) {
    total += item.price * item.quantity;
  }
  return total;
}


addItem({name: "Äpple", price: 5, quantity: 3});
addItem({name: "Pärn", price: 50, quantity: 3});

console.log("Totalt: " + getTotalPrice() + " kr"); // Ska vara 45 kr