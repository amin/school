# Lektion 2 - `tsc`, funktioner, objekt & egna typer

Förra lektionen körde vi `.ts`-filer med [`tsx`](../references/tsx.md) - snabbt men inga typkontroller. Idag sätter vi upp riktig typkontroll med [`tsc`](../references/tsc.md), och lär oss typa funktioner, objekt och egna datastrukturer.

- 📚 Dokumentation
  - [Everyday Types - Functions](https://www.typescriptlang.org/docs/handbook/2/functions.html)
  - [Everyday Types - Object Types](https://www.typescriptlang.org/docs/handbook/2/objects.html)
  - [Type Aliases](https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#type-aliases)
  - [tsconfig reference](https://www.typescriptlang.org/tsconfig)
- 🔗 Referenser i kursen
  - [`tsc`](../references/tsc.md) - kompilatorn och `tsconfig.json`
  - [`tsx`](../references/tsx.md) - kör `.ts` direkt
  - [primitives](../references/primitives.md)
  - [union-types](../references/union-types.md)
  - [unknown-vs-any](../references/unknown-vs-any.md)

---

## Block 1 - `tsc` + `tsconfig.json`

`tsx` strippar typer och kör. `tsc` gör två saker:

1. **Typkontroll** - fångar fel innan koden körs
2. **Transpilering** - omvandlar `.ts` → `.js`

### Minsta möjliga `tsconfig.json`

```json
{
  "compilerOptions": {
    "target": "es2022",
    "module": "nodenext",
    "strict": true,
    "rootDir": "src",
    "outDir": "dist"
  },
  "include": ["src/**/*"]
}
```

- `target` - vilken JS-version output blir
- `module` - vilket modul-system (ESM, CommonJS, etc.)
- `strict` - aktiverar alla strikta kontroller
- `rootDir` / `outDir` - var källkod läses / var bygget hamnar

### Scripts i `package.json`

```json
"scripts": {
  "dev": "tsx watch src/index.ts",
  "typecheck": "tsc --noEmit",
  "build": "tsc",
  "start": "node dist/index.js"
}
```

Separationen: `dev` = snabb körning, `typecheck` = bara typkoll, `build` = skriv `.js`, `start` = kör bygget.

Mer i [`references/tsc.md`](../references/tsc.md).

---

## Block 2 - Funktioner

### Parameter och returtyper

Typa **in** (parametrar) och **ut** (returtyp):

```ts
function bookLabel(title: string, author: string): string {
  return `${title} av ${author}`;
}
```

Returtypen kan ofta utelämnas - TS inferrar den från `return`-satsen. Men en explicit returtyp gör att TS validerar funktionens implementation mot signaturen.

### Arrays

Två syntaxer, samma sak:

```ts
const titles: string[] = ["Dune", "1984"];
const years: Array<number> = [1965, 1949];
```

### void

Funktioner som inte returnerar något:

```ts
function printTitles(titles: string[]): void {
  for (const t of titles) console.log(t);
}
```

### Optional parameters

`?` efter parameternamnet - värdet blir `Type | undefined`:

```ts
function describe(title: string, genre?: string): string {
  return genre ? `${title} (${genre})` : title;
}

describe("Dune"); // ok
describe("Dune", "sci-fi"); // ok
```

### Default-värden

Om parametern utelämnas används defaulten. TS härleder typen från defaulten:

```ts
function greet(name: string, greeting = "Hej") {
  return `${greeting}, ${name}!`;
}
```

### Union types (recap från L1)

En parameter kan acceptera flera typer med `|`:

```ts
function searchLabel(query: string | number): string {
  return `söker på ${query}`;
}
```

Men inuti funktionen vet TS bara de operationer som fungerar på **båda** typerna. För att använda type-specifika metoder måste vi **narrowa** typen - berätta för TS vilken av de två vi har just nu. Enklast med `typeof`:

```ts
function searchLabel(query: string | number): string {
  if (typeof query === "number") {
    return `söker på id ${query}`; // här vet TS att query är number
  }
  return `söker på titel ${query.toLowerCase()}`; // här är query string
}
```

Samma gäller returtyper - `string | undefined` är vanligt när något "kan saknas":

```ts
function firstTitle(titles: string[]): string | undefined {
  return titles[0]; // tom array → undefined
}
```

### Namngivna parametrar (destrukturering)

När en funktion tar många argument blir positionsordningen förvirrande. Ta ett objekt istället:

```ts
function createBook({
  title,
  author,
  year,
}: {
  title: string;
  author: string;
  year: number;
}) {
  return { title, author, year };
}

createBook({ title: "Dune", author: "Herbert", year: 1965 });
```

---

## Block 3 - Objekt & egna typer

### Objekttyp inline

```ts
function printBook(book: { title: string; year: number }) {
  console.log(`${book.title} (${book.year})`);
}
```

Funkar, men blir jobbigt när samma typ upprepas på flera ställen.

### Type aliases

Ge objekttypen ett namn:

```ts
type Book = {
  id: number;
  title: string;
  author: string;
  year: number;
};

function printBook(book: Book) {
  console.log(`${book.title} (${book.year})`);
}
```

### Literal types som union

Typer behöver inte vara bara `string` eller `number` - de kan vara specifika värden. Kombinerat med `|` får vi en fix uppsättning tillåtna värden:

```ts
type Genre = "fiction" | "non-fiction" | "sci-fi" | "fantasy";

const g: Genre = "sci-fi"; // ok
const g2: Genre = "horror"; // ❌ inte en giltig Genre
```

### Optional properties

Samma `?`-syntax som för parametrar:

```ts
type Book = {
  id: number;
  title: string;
  rating?: number; // kan saknas
};

const b: Book = { id: 1, title: "Dune" }; // ok utan rating
```

### readonly

Förhindra ändring efter skapande:

```ts
type Book = {
  readonly id: number;
  title: string;
};

const b: Book = { id: 1, title: "Dune" };
b.title = "Dune (ny)"; // ok
b.id = 99; // ❌ Cannot assign to 'id'
```

### Typer i egna filer

Samla typer där de hör hemma:

```ts
// src/types.ts
export type Book = {
  id: number;
  title: string;
  author: string;
  year: number;
};
```

```ts
// src/books.ts
import type { Book } from "./types.js";

export function formatBook(book: Book): string {
  return `${book.title} av ${book.author}`;
}
```

`import type` gör tydligt att det bara är en typ - strippas bort i kompileringen.
