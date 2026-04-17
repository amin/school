/*

Välkommen till

................................................................
.                                                              .
.        L E K T I O N   3   -   Ö V N I N G A R               .
.                                                              .
.              Inheritance, Enums & keyof                      .
.                                                              .
................................................................

Mål:
  Få alla filer att typechecka utan fel. Varje övning introducerar
  ett koncept - fixa den innan du går vidare.

Regler:
  1. Undvik `any`. Använd `unknown` om du inte vet typen.
  2. Svårigheten ökar gradvis.
  3. Länkar till dokumentation finns längst ner i varje övning.
  4. Lös i grupp och diskutera högt.

Kör:
  npm run typecheck   (visar typfel)
  npm run dev         (kör koden)

Vi bygger vidare på L2:s bibliotekssystem - samma Book-typ som grund.

*/

// ═════════════════════════════════════════════════════════════
// Utgångspunkt - Book-typen från L2
// ═════════════════════════════════════════════════════════════

type Book = {
  id: number;
  title: string;
  author: string;
  year: number;
  rating?: number;
};

// ═════════════════════════════════════════════════════════════
// Övning 3.1 - interface extends
// ═════════════════════════════════════════════════════════════
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

// TODO: interface IBook = ...

interface IBook {
  id: number;
  title: string;
  author: string;
  year: number;
  rating?: number;
}

interface IAudioBook extends IBook {
  narrator: string,
  durationMin: number
}

const audioBook: IAudioBook = {
  id: 1,
  narrator: "Stephen Hawkings",
  title: "How I met your mother",
  author: "HC Andersson",
  year: 1995,
  durationMin: 30
};

// Docs: https://www.typescriptlang.org/docs/handbook/2/objects.html#extending-types

// ═════════════════════════════════════════════════════════════
// Övning 3.2 - Type intersection (&)
// ═════════════════════════════════════════════════════════════
/*

Intro:

    Samma idé som 3.1 - men med `type` istället för `interface`.
    `&` kombinerar typer: resultatet har alla fält från båda sidor.

Exercise:

    1. Skapa type `AudioBookT` som är `Book & { narrator, durationMin }`.
    2. Typa `book`-parametern som `AudioBookT` och lägg till returtyp.
    3. Returnera "Dune (läst av Simon Vance, 1260 min)".

*/

// TODO: 

type AudioBookT = Book & {
  narrator: string,
  durationMin: number
}

function formatAudioBook({title, narrator, durationMin}: AudioBookT): string {
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

// ═════════════════════════════════════════════════════════════
// Övning 3.3 - Multiple inheritance
// ═════════════════════════════════════════════════════════════
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

interface ILoggedBook extends IBook, ITimestamped {}

const loggedBook: ILoggedBook = {
  id: 2,
  title: "This is a title",
  author: "HC Andersson",
  year: 1996,
  createdAt: new Date("2021-12-12")
};

// Docs: https://www.typescriptlang.org/docs/handbook/2/objects.html#extending-types

// ═════════════════════════════════════════════════════════════
// Övning 3.4 - String enum
// ═════════════════════════════════════════════════════════════
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

// TODO: 

enum BookStatus {
  Available = "AVAILABILE",
  CheckedOut = "CHECKED_OUT",
  Reserved = "RESERVED",
  Lost = "LOST"
}

function describeStatus(status: BookStatus) {
  switch (status) {
    case BookStatus.Available:
      return "tillgänlig"
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

// Docs: https://www.typescriptlang.org/docs/handbook/enums.html

// ═════════════════════════════════════════════════════════════
// Övning 3.5 - Alternativ till enum: literal union
// ═════════════════════════════════════════════════════════════
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
      return "tillgänlig"
    case "checked-out":
      return "utlånad";
    case "reserved":
      return "reserverad";
    case "lost":
      return "försvunnen";
    default:
      return "okänd status"
  }
}

console.log(describeStatusLiteral("available"));

// Docs: https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#literal-types

// ═════════════════════════════════════════════════════════════
// Övning 3.6 - keyof
// ═════════════════════════════════════════════════════════════
/*

Intro:

    `keyof T` ger en union av alla property-namn i T. Det är hur vi
    säger "vilken nyckel som helst från det här objektet" som en typ.

Exercise:

    1. Skapa `type BookKey = keyof Book`. Vad blir typen?
    2. Typa printField så `key` är av typen `BookKey`.

*/

// TODO: type BookKey = ...

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
//printField(bookForField, "xyz"); // ❌ ska ge typfel när du typat rätt
// Docs: https://www.typescriptlang.org/docs/handbook/2/keyof-types.html

// ═════════════════════════════════════════════════════════════
// Övning 3.7 - typeof i typkontext
// ═════════════════════════════════════════════════════════════
/*

Intro:

    `typeof variable` i typkontext hämtar typen av en befintlig
    variabel. Vanligt mönster för att slippa skriva typen två gånger.

Exercise:

    1. Skapa `type DefaultBookT = typeof defaultBook`. Jämför med Book.
    2. Typa printDefault så `book` är av typen `DefaultBookT`.

*/

type DefaultBookT = typeof defaultBook;

const defaultBook = {
  id: 0,
  title: "Unknown",
  author: "Unknown",
  year: 0,
};

// TODO: type DefaultBookT = ...

function printDefault(book: DefaultBookT) {
  console.log(`${book.title} av ${book.author}`);
}

printDefault(defaultBook); // ok
//printDefault({ title: "Dune" }); // ❌ saknar fält

// Docs: https://www.typescriptlang.org/docs/handbook/2/typeof-types.html

// ═════════════════════════════════════════════════════════════
// Övning 3.8 - Sammanfattande: event log
// ═════════════════════════════════════════════════════════════
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

// TODO: 

enum LogLevel {
  Info = "Info",
  Warning = "Warning",
  Error = "Error"
}
interface ILogEntry {
  timestamp: Date,
  level: LogLevel,
  message: string,
  bookId: number
} 

interface IBookLogEntry extends ILogEntry {
  action: "borrowed" | "returned" | "lost"
}

function logAction(entries: IBookLogEntry[], entry: IBookLogEntry) {
  return [...entries, entry]
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
console.log(getLogField(log[0], "xyz")); // ❌

// ═════════════════════════════════════════════════════════════
// BONUS - Discriminated unions
// ═════════════════════════════════════════════════════════════
/*

Exercise:

    Få anropen nedan att typechecka. Lös det med discriminated
    unions. describeEvent ska returnera en beskrivande sträng
    för varje variant.

    Tips:
    - Skapa IBorrowedEvent, IReturnedEvent, ILostEvent (varje med sitt `kind`-fält).
    - Skapa `type BookEvent` som union av de tre.
    - Använd switch på `event.kind` inuti describeEvent.

*/

type BookEventT =
  | { kind: "borrowed"; bookId: number; dueDate: Date }
  | { kind: "returned"; bookId: number; rating: number }
  | { kind: "lost"; bookId: number; fee: number };

function describeEvent(event: BookEventT) {
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
