/*

Intro:

    Biblioteket ska börja hantera ljudböcker. En ljudbok är en bok -
    men med en uppläsare och en längd. Istället för att skriva om
    alla fält utökar vi den befintliga typen.

Exercise:

    1. Konvertera Book till en `interface IBook` (samma fält).
    2. Skapa `interface IAudioBook` som extendar `IBook` och lägger
       till `narrator: string` och `durationMin: number`.
    3. Fyll i saknade fält i audioBook nedan så det typecheckar.

*/

interface IBook {
  id: number;
  title: string;
  author: string;
  year: number;
  rating?: number;
}

interface IAudioBook extends IBook {
  narrator: string;
  durationMin: number;
}

const audioBook: IAudioBook = {
  id: 1,
  title: "My First Book",
  author: "Jonatan",
  year: 2002,
  narrator: "Jonatan",
  durationMin: 10,
};

/*

Intro:

    Samma idé som 3.1 - men med `type` istället för `interface`.
    `&` kombinerar typer: resultatet har alla fält från båda sidor.

Exercise:

    1. Skapa type `AudioBookT` som är `Book & { narrator, durationMin }`.
    2. Typa `book`-parametern som `AudioBookT` och lägg till returtyp.
    3. Returnera "Dune (läst av Simon Vance, 1260 min)".

*/

type Book = {
  id: number;
  title: string;
  author: string;
  year: number;
  rating?: number;
};

// TODO: type AudioBookT = ...
type AudioBookT = Book & {
  narrator: string;
  durationMin: number;
};

function formatAudioBook({ title, narrator, durationMin }: AudioBookT): string {
  // TODO: returnera "${title} (läst av ${narrator}, ${durationMin} min)"
  return `${title} (läst av ${narrator}, ${durationMin} min)`;
}

console.log(
  formatAudioBook({
    id: 1,
    title: "Dune",
    author: "Herbert",
    year: 1965,
    narrator: "Simon Vance",
    durationMin: 1260,
  }),
);

// Docs: https://www.typescriptlang.org/docs/handbook/2/objects.html#intersection-types

/*

Intro:

    Biblioteket loggar när böcker skapas och senast lästes. En
    `ILoggedBook` är både en `IBook` och `ITimestamped`.

Exercise:

    1. Skapa `interface ILoggedBook` som extendar både IBook och
       ITimestamped och lägger till `lastReadAt: Date`.
    2. Fyll i saknade fält i loggedBook nedan.

*/

interface ITimestamped {
  createdAt: Date;
}

// TODO: interface ILoggedBook extends ...

interface ILoggedBook extends IBook, ITimestamped {
  lastReadAt: Date;
}

const loggedBook: ILoggedBook = {
  id: 1,
  title: "My First Book",
  author: "Jonatan",
  year: 2002,
  createdAt: new Date(),
  lastReadAt: new Date(),
};

/*

Intro:

    En bok kan vara tillgänglig, utlånad, reserverad eller försvunnen.
    Vi har bara fyra giltiga status-värden - perfekt för en enum.

Exercise:

    1. Skapa en `enum BookStatus` med string-värden:
         Available = "AVAILABLE"
         CheckedOut = "CHECKED_OUT"
         Reserved = "RESERVED"
         Lost = "LOST"
    2. Typa funktionen describeStatus. Använd switch och returnera
       svensk text för varje värde.

*/

// TODO: enum BookStatus = ...

enum BookStatus {
  Available = "AVAILABLE",
  CheckedOut = "CHECKED_OUT",
  Reserved = "RESERVED",
  Lost = "LOST",
}

function describeStatus(status: BookStatus): string {
  switch (status) {
    case BookStatus.Available:
      return "tillgänglig";
    case BookStatus.CheckedOut:
      return "utlånad";
    case BookStatus.Reserved:
      return "reserverad";
    case BookStatus.Lost:
      return "försvunnen";
  }
}

console.log(describeStatus(BookStatus.Available));
console.log(describeStatus(BookStatus.CheckedOut));

/*

Intro:

    Enums är inte det enda sättet. Många moderna kodbaser använder
    en literal union istället - samma funktionalitet, mindre kod.

Exercise:

    1. Skapa `type BookStatusLiteral` som en union av strings:
       "available" | "checked-out" | "reserved" | "lost".
    2. Skriv en identisk describeStatusLiteral.

*/

type BookStatusLiteral = "available" | "checked-out" | "reserved" | "lost";

function describeStatusLiteral(status: BookStatusLiteral) {
  switch (status) {
    case "available":
      return "tillgänglig";
    case "checked-out":
      return "utlånad";
    case "reserved":
      return "reserverad";
    case "lost":
      return "försvunnen";
  }
}

console.log(describeStatusLiteral("available"));

/*

Intro:

    `keyof T` ger en union av alla property-namn i T. Det är hur vi
    säger "vilken nyckel som helst från det här objektet" som en typ.

Exercise:

    1. Skapa `type BookKey = keyof Book`. Vad blir typen?
    2. Typa printField så `key` är av typen `BookKey`.

*/

type BookKey = keyof Book;

function printField(book: Book, key: BookKey) {
  console.log(book[key]);
}

const bookForField: Book = {
  id: 1,
  title: "Dune",
  author: "Herbert",
  year: 1965,
};
printField(bookForField, "title"); // ok
// printField(bookForField, "xyz"); // ❌ ska ge typfel när du typat rätt

/*

Intro:

    `typeof variable` i typkontext hämtar typen av en befintlig
    variabel. Vanligt mönster för att slippa skriva typen två gånger.

Exercise:

    1. Skapa `type DefaultBookT = typeof defaultBook`. Jämför med Book.
    2. Typa printDefault så `book` är av typen `DefaultBookT`.

*/

const defaultBook = {
  id: 0,
  title: "Unknown",
  author: "Unknown",
  year: 0,
};

type DefaultBookT = typeof defaultBook;

function printDefault(book: DefaultBookT) {
  console.log(`${book.title} av ${book.author}`);
}

printDefault(defaultBook); // ok
// printDefault({ title: "Dune" }); // ❌ saknar fält

/*

Intro:

    Bygg en typsäker event-log. Kombinerar enum, inheritance och
    keyof i en realistisk struktur.

Exercise:

    1. Skapa en string `enum LogLevel` med Info, Warning, Error.
    2. Skapa `interface ILogEntry`:
         timestamp: Date
         level: LogLevel
         message: string
         bookId: number
    3. Skapa `interface IBookLogEntry extends ILogEntry` med
         action: "borrowed" | "returned" | "lost"
    4. Typa logAction - lägg till en IBookLogEntry i arrayen.
    5. Typa getLogField - `key` ska vara `keyof IBookLogEntry`.
       (Notera: returtypen blir bred - en union av ALLA fält-typer.
        TS kan inte säga "om key är 'message' så är värdet string"
        med bara keyof. Det fixar vi med generics i L4.)

*/

// TODO: enum LogLevel = ...
// TODO: interface ILogEntry = ...
// TODO: interface IBookLogEntry extends ...

enum LogLevel {
  Info = "INFO",
  Warning = "WARNING",
  Error = "ERROR",
}

interface ILogEntry {
  timestamp: Date;
  level: LogLevel;
  message: string;
  bookId: number;
}

interface IBookLogEntry extends ILogEntry {
  action: "borrowed" | "returned" | "lost";
}

function logAction(entries: IBookLogEntry[], entry: IBookLogEntry) {
  // TODO: typa params som IBookLogEntry[] och IBookLogEntry.
  //       Returnera ny array med entry tillagd.
  return [...entries, entry];
}

function getLogField(entry: IBookLogEntry, key: keyof IBookLogEntry) {
  // TODO: typa entry som IBookLogEntry och key som keyof IBookLogEntry.
  return entry[key];
}

const log = logAction([], {
  timestamp: new Date(),
  level: LogLevel.Info,
  message: "Boken lånades ut",
  bookId: 1,
  action: "borrowed",
});
console.log(getLogField(log[0], "message"));
// console.log(getLogField(log[0], "xyz")); // ❌

/*

Intro:

    Olika events har olika fält. En "borrowed" har en deadline,
    en "returned" har ett betyg, en "lost" har en fee. Det skulle
    bli rörigt att lägga alla fält som optional i samma typ.

    Istället: gör en union där varje variant har ett gemensamt
    "kind"-fält som avslöjar vilken variant det är. TypeScript
    kan sedan narrowa typen baserat på det fältet.

Exercise:

    1. Skapa tre interface (eller types) som delar fältet `kind`:
         IBorrowedEvent   { kind: "borrowed";   bookId: number; dueDate: Date }
         IReturnedEvent   { kind: "returned";   bookId: number; rating: number }
         ILostEvent       { kind: "lost";       bookId: number; fee: number }

    2. Skapa `type BookEvent` som är en union av alla tre.

    3. Typa describeEvent så den tar en BookEvent och returnerar
       en beskrivning. Använd switch på `event.kind` - notera hur
       TS automatiskt narrowar typen inuti varje case.

*/

// TODO: IBorrowedEvent, IReturnedEvent, ILostEvent
// TODO: type BookEvent = ...

// Lösning 1: interface extends med gemensam bas
// Fördelen: `bookId` definieras på ett ställe, DRY.

interface IBookId {
  bookId: number;
}

interface IBorrowedEvent extends IBookId {
  kind: "borrowed";
  dueDate: Date;
}

interface IReturnedEvent extends IBookId {
  kind: "returned";
  rating: number;
}

interface ILostEvent extends IBookId {
  kind: "lost";
  fee: number;
}

type BookEvent = IBorrowedEvent | IReturnedEvent | ILostEvent;

function describeEvent(event: BookEvent) {
  // TODO: switch på event.kind
  //   "borrowed" → "Lånad, återlämnas ${dueDate}"
  //   "returned" → "Återlämnad med betyg ${rating}"
  //   "lost"     → "Försvunnen, avgift ${fee} kr"
  switch (event.kind) {
    case "borrowed":
      return `Lånad, återlämnas ${event.dueDate.toISOString()}`;
    case "returned":
      return `Återlämnad med betyg ${event.rating}`;
    case "lost":
      return `Försvunnen, avgift ${event.fee} kr`;
  }
}

console.log(
  describeEvent({ kind: "borrowed", bookId: 1, dueDate: new Date() }),
);
console.log(describeEvent({ kind: "returned", bookId: 1, rating: 5 }));
console.log(describeEvent({ kind: "lost", bookId: 1, fee: 150 }));

// Alternativ lösning: type + inline discriminated union
// Samma form, men allt i en typ-definition. Mer kompakt om man inte
// behöver återanvända varianterna var för sig.

type BookEventT =
  | { kind: "borrowed"; bookId: number; dueDate: Date }
  | { kind: "returned"; bookId: number; rating: number }
  | { kind: "lost"; bookId: number; fee: number };

function describeEventT(event: BookEventT): string {
  switch (event.kind) {
    case "borrowed":
      return `Lånad, återlämnas ${event.dueDate.toISOString()}`;
    case "returned":
      return `Återlämnad med betyg ${event.rating}`;
    case "lost":
      return `Försvunnen, avgift ${event.fee} kr`;
  }
}

console.log(
  describeEventT({ kind: "borrowed", bookId: 1, dueDate: new Date() }),
);

// Docs: https://www.typescriptlang.org/docs/handbook/2/narrowing.html#discriminated-unions
