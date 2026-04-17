# Lektion 3 - Inheritance, Enums & `keyof`

Förra lektionen lärde vi oss typa funktioner, objekt och egna typer. Idag bygger vi vidare: hur typer **ärver** från varandra, fasta uppsättningar av värden (**enums**), och hur vi hämtar nycklar från en typ med **`keyof`**.

- 📚 Dokumentation
  - [Object Types - Extending Types](https://www.typescriptlang.org/docs/handbook/2/objects.html#extending-types)
  - [Object Types - Intersection Types](https://www.typescriptlang.org/docs/handbook/2/objects.html#intersection-types)
  - [Enums](https://www.typescriptlang.org/docs/handbook/enums.html)
  - [Keyof Type Operator](https://www.typescriptlang.org/docs/handbook/2/keyof-types.html)
- 🔗 Referenser i kursen
  - [`type` vs `interface`](../references/type-vs-interface.md)
  - [enums](../references/enums.md) - alternativ och trade-offs

---

## Block 1 - Inheritance

En typ byggs ofta på en annan. En `IAudioBook` _är_ en `IBook` med extra properties. TypeScript ger två verktyg för detta: `interface extends` och type intersection (`&`).

### `interface extends`

```ts
interface IBook {
  id: number;
  title: string;
  author: string;
}

interface IAudioBook extends IBook {
  narrator: string;
  durationMin: number;
}

const ab: IAudioBook = {
  id: 1,
  title: "Dune",
  author: "Herbert",
  narrator: "Simon Vance",
  durationMin: 1260,
};
```

`IAudioBook` har alla fält från `IBook` plus två egna.

### Flera interface samtidigt

`extends` kan ta flera:

```ts
interface ITimestamped {
  createdAt: Date;
}

interface ILoggedBook extends IBook, ITimestamped {
  lastReadAt: Date;
}
```

### Type intersection (`&`)

Samma idé men med `type`:

```ts
type Book = {
  id: number;
  title: string;
};

type AudioBook = Book & {
  narrator: string;
  durationMin: number;
};
```

`&` kombinerar - resultatet har **alla** fält från båda sidorna.

### `extends` vs `&`

`interface extends` kräver att det du ärver från är en konkret objekt-form (ett interface eller en `type` som beskriver ett objekt). Unions och primitiver funkar inte. `&` har inga sådana krav.

```ts
interface IBook {
  title: string;
}
type BookMeta = { createdAt: Date };
type AuthorOrId = { author: string } | { id: number };

// ── interface extends ──
interface A extends IBook {
  /* ... */
} // ✅ ett annat interface
interface B extends BookMeta {
  /* ... */
} // ✅ en type som är en objekt-form
interface C extends AuthorOrId {
  /* ... */
} // ❌ en union - inte en enskild objekt-form
interface D extends string {
  /* ... */
} // ❌ en primitiv

// ── & (intersection) ──
type E = IBook & BookMeta; // ✅ interface + type
type F = IBook & AuthorOrId; // ✅ interface + union
type G = BookMeta & { x: number }; // ✅ type + inline objekt
```

Tumregel: för objekt-typer är de utbytbara. När något blir "konstigare" (union, primitiv, komplex transformation) - välj `&`.

Mer i [`type-vs-interface`](../references/type-vs-interface.md).

---

## Block 2 - Enums

En **enum** är en namngiven uppsättning relaterade värden. Användbart när bara ett begränsat antal är giltiga.

### String enum (rekommenderat)

```ts
enum BookStatus {
  Available = "AVAILABLE",
  CheckedOut = "CHECKED_OUT",
  Reserved = "RESERVED",
  Lost = "LOST",
}

const status: BookStatus = BookStatus.Available;
```

### Numeric enum

Utan explicita värden räknas medlemmarna från 0:

```ts
enum BookStatus {
  Available, // 0
  CheckedOut, // 1
  Reserved, // 2
  Lost, // 3
}
```

### Enums i en switch

Klassisk kombo:

```ts
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
```

### Finns det alternativ?

Ja. Moderna TS-kodbaser använder ofta **literal unions** istället:

```ts
type BookStatus = "available" | "checked-out" | "reserved" | "lost";
```

Skillnader, varför och när man väljer vad: se [`references/enums.md`](../references/enums.md). För den här kursen räcker det att du känner igen båda när du ser dem.

---

## Block 3 - `keyof` & `typeof`

Två **typoperatorer** som plockar ut information från befintliga typer - så du slipper skriva samma saker på flera ställen.

### `keyof` - hämta nycklar som typ

`keyof T` ger en union av alla property-namn i `T`:

```ts
type Book = {
  id: number;
  title: string;
  author: string;
};

type BookKey = keyof Book; // "id" | "title" | "author"
```

Detta är samma som att skriva:

```ts
type BookKey = "id" | "title" | "author";
```

Skillnaden: om `Book` ändras hänger `BookKey` med automatiskt. Du slipper hålla dem synkroniserade.

### `keyof` som parameter-typ

Användbart när en funktion ska ta "vilken som helst nyckel av `Book`":

```ts
function printField(book: Book, key: keyof Book): void {
  console.log(book[key]);
}

printField({ id: 1, title: "Dune", author: "Herbert" }, "title"); // ok
printField({ id: 1, title: "Dune", author: "Herbert" }, "xyz"); // ❌ "xyz" är inte keyof Book
```

Utan `keyof` hade du fått skriva `"id" | "title" | "author"` för hand - och uppdatera det varje gång typen ändras.

### `typeof` i typkontext

I JS har `typeof` en runtime-betydelse (`typeof x === "string"`). I TS kan du _också_ använda den i typkontext för att hämta typen av en variabel:

```ts
const defaultBook = {
  id: 0,
  title: "Unknown",
  author: "Unknown",
};

type Book = typeof defaultBook;
// { id: number; title: string; author: string }
```

Användbart när ett objekt redan finns och du vill slippa skriva typen två gånger.

### Narrowing med `typeof` (recap från L2)

Samma ord, annan betydelse i runtime-kontext - används för att narrowa union types:

```ts
function search(query: string | number): string {
  if (typeof query === "number") {
    return `id ${query}`;
  }
  return `titel ${query}`;
}
```

Samma operator, två jobb. TS förstår vilket från sammanhanget.
