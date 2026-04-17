/*

Välkommen till

................................................................
.                                                              .
.        L E K T I O N   2   -   Ö V N I N G A R               .
.                                                              .
.             Funktioner, objekt & egna typer                  .
.                                                              .
................................................................

Mål:
  Få alla filer att typechecka utan fel. Varje övning introducerar
  ett koncept - fixa den innan du går vidare.

Regler:
  1. Undvik `any`. Använd `unknown` om du inte vet typen.
  2. Svårigheten ökar gradvis.
  3. Länkar till dokumentation finns längst ner i varje övning.
  4. Lös i grupp och diskutera högt

Kör:
  pnpm typecheck   (visar typfel)
  pnpm dev         (kör koden)

*/

// ─────────────────────────────────────────────────────────────
// Block 1 - tsc + tsconfig
// ─────────────────────────────────────────────────────────────
//
// Görs i terminalen och package.json. Se README.md.
// Verifiering: raden nedan ska ge typfel i `pnpm typecheck` men
// ändå köra i `pnpm dev`.

// const block1Check: string = 42; // ← avkommentera

// ═════════════════════════════════════════════════════════════
// Övning 2.1 - Typa en funktion
// ═════════════════════════════════════════════════════════════
/*

Intro:

    Vi bygger ett bibliotekssystem. Första funktionen formaterar en bok
    som en textetikett. Den funkar redan i JS - men saknar typer.

Exercise:

    Lägg till typer på parametrarna och explicit returtyp så funktionen
    typecheckar. Försök sedan anropa funktionen med fel typ - vad händer?

*/

function bookLabel(title: string, author: string) {
  return `${title} av ${author}`;
}

console.log(bookLabel("Dune", "Frank Herbert"));

// Docs: https://www.typescriptlang.org/docs/handbook/2/functions.html

// ═════════════════════════════════════════════════════════════
// Övning 2.2 - Arrays och void
// ═════════════════════════════════════════════════════════════
/*

Intro:

    Vi behöver skriva ut alla titlar i biblioteket. Funktionen returnerar
    ingenting - den skriver bara till konsolen.

Exercise:

    1. Typa `titles` som en array av strings.
    2. Lägg till returtyp `void` (funktionen returnerar inget värde).

*/

function printTitles(titles: string[]) {
  for (const title of titles) console.log(`- ${title}`);
}

printTitles(["Dune", "The Hobbit", "1984"]);

// Docs: https://www.typescriptlang.org/docs/handbook/2/functions.html#return-type-annotations

// ═════════════════════════════════════════════════════════════
// Övning 2.3 - Optional och default parameters
// ═════════════════════════════════════════════════════════════
/*

Intro:

    En bok har alltid en titel, men genre är valfritt. Språk har ett
    default - om inget anges är boken på svenska.

Exercise:

    1. Typa `describeBook` - `genre` ska vara optional (`?`).
       Returnera "Dune (sci-fi)" om genre finns, annars bara "Dune".

    2. Typa `describeBookWithDefault` - `lang` ska ha default "svenska".
       Returnera "Dune (svenska)".

*/

function describeBook(title: string, genre?: string) {
  return genre ? `${title} (${genre})` : `${title}`
}

function describeBookWithDefault(title: string, lang: string = "svenska") {
  return `${title} (${lang})`;
}

console.log(describeBook("Dune"));
console.log(describeBook("Dune", "sci-fi"));
console.log(describeBookWithDefault("Dune"));

// Docs:
//   https://www.typescriptlang.org/docs/handbook/2/functions.html#optional-parameters
//   https://www.typescriptlang.org/docs/handbook/2/functions.html#parameter-type-annotations

// ═════════════════════════════════════════════════════════════
// Övning 2.4 - Union types och narrowing
// ═════════════════════════════════════════════════════════════
/*

Intro:

    Sökfunktionen ska fungera på två sätt: antingen söker användaren
    på id (number) eller titel (string). Samma funktion, olika input.

Exercise:

    Typa `query` så att den accepterar både string och number.
    Returnera "söker på id 1" eller "söker på titel Dune" beroende
    på typen. Använd `typeof` för att narrowa.

*/

function searchLabel(query: number | string) {
  return typeof query === "number" ? `söker på id ${query}` : `söker på title ${query}`;
}

console.log(searchLabel(1));
console.log(searchLabel("Dune"));

// Docs:
//   https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#union-types
//   https://www.typescriptlang.org/docs/handbook/2/narrowing.html#typeof-type-guards

// ═════════════════════════════════════════════════════════════
// Övning 2.5 - Egen typ med `type`
// ═════════════════════════════════════════════════════════════
/*

Intro:

    Vi har börjat skicka runt bok-objekt i koden. Istället för att
    upprepa samma objekt-form överallt skapar vi en egen typ.

Exercise:

    1. Skapa en type `Book` med fälten:
         id: number
         title: string
         author: string
         year: number
         rating: number, men optional (alla böcker har inte betyg)

    2. Typa funktionen `formatBook` - returnera
       "#1 Dune av Frank Herbert (1965) ★5".
       Utelämna stjärn-delen om rating saknas.

*/

// TODO: type Book = ...

type Book = {
  id: number;
  title: string;
  author: string;
  year: number;
  rating?: number
}

function formatBook(book: Book) {
  return `#${book.id} ${book.title} av ${book.author} (${book.year}) ${book.rating ? `★${book.rating}` : ''}`;
}

console.log(
  formatBook({
    id: 1,
    title: "Dune",
    author: "Frank Herbert",
    year: 1965,
    rating: 5,
  }),
);
console.log(
  formatBook({ id: 2, title: "Sapiens", author: "Harari", year: 2011 }),
);

// Docs:
//   https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#type-aliases
//   https://www.typescriptlang.org/docs/handbook/2/objects.html#optional-properties

// ═════════════════════════════════════════════════════════════
// Övning 2.6 - readonly och literal union
// ═════════════════════════════════════════════════════════════
/*

Intro:

    Ett boks-id sätts när boken läggs till och får aldrig ändras.
    Genre är begränsat till fyra värden - inga andra strängar ska
    få smita in.

Exercise:

    1. Skapa type `Genre` som en union av literals:
       "fiction" | "non-fiction" | "sci-fi" | "fantasy".

    2. Skapa type `ImmutableBook` med `readonly id` och `title`.

    3. Funktionen `isFiction` returnerar true för fiction, sci-fi
       och fantasy.

    4. Avkommentera tilldelningen längst ner - läs felmeddelandet.

*/

// TODO: type Genre = ...

type Genre = "fiction" | "non-fiction" | "sci-fi" | "fantasy";

type ImmutableBook = {
  readonly id: string,
  title: string
}

function isFiction(genre: Genre) {
  return genre !== "non-fiction" ? true : false;
}

console.log(isFiction("sci-fi"));
console.log(isFiction("non-fiction"));

const b: ImmutableBook = { id: 1, title: "Dune" };
b.title = "Ny titel"; // ok
b.id = 99;            // ← avkommentera - varför klagar TS?

// Docs:
//   https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#literal-types
//   https://www.typescriptlang.org/docs/handbook/2/objects.html#readonly-properties

// ═════════════════════════════════════════════════════════════
// Övning 2.7 - Sammanfattande: bibliotekets operationer
// ═════════════════════════════════════════════════════════════
/*

Intro:

    Nu har vi verktygen. Implementera tre funktioner som opererar på
    ett helt bibliotek. Notera att `library` är otypad medvetet -
    TS inferrar från literalen, men du kan behöva typa parametrarna.

Exercise:

    1. booksWithRating - returnera bara böcker som har en rating.
    2. findBook - sök på id (number) eller titel (string). Använd typeof.
       Returnera Book | undefined.
    3. averageRating - genomsnittligt betyg över böcker med rating.
       Returnera undefined om ingen bok har rating.

*/

const library = [
  { id: 1, title: "Dune", author: "Frank Herbert", year: 1965, rating: 5 },
  { id: 2, title: "The Hobbit", author: "Tolkien", year: 1937, rating: 5 },
  { id: 3, title: "Sapiens", author: "Harari", year: 2011 },
  { id: 4, title: "1984", author: "Orwell", year: 1949, rating: 4 },
  { id: 5, title: "Meditations", author: "Marcus Aurelius", year: 180 },
  {
    id: 6,
    title: "Project Hail Mary",
    author: "Andy Weir",
    year: 2021,
    rating: 5,
  },
];

function booksWithRating(books: Book[]) {
  return books.filter((book) => book.rating);
}

function findBook(books: Book[], query: number | string): Book | undefined {
  return typeof query === "number"
    ? books.find((book) => book.id === query)
    : books.find((book) => book.title === query)
}

function averageRating(books: Book[]) {
  books = books.filter((book) => typeof book.rating !== "undefined");
  return books.reduce((sum: number, book: Book) => sum + book.rating!, 0) / books.length;
}

//console.log(booksWithRating(library));
//console.log(findBook(library, 2));
//console.log(findBook(library, "Dune"));
console.log(averageRating(library));

// Docs: samtliga länkar från övningarna ovan.
