type Book = {
  id: number;
  title: string;
  author: string;
  year: number;
  rating?: number;
};

type Genre = "fiction" | "non-fiction" | "sci-fi" | "fantasy";

type ImmutableBook = {
  readonly id: number;
  title: string;
};

const library: Book[] = [
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

function bookLabel(title: string, author: string): string {
  return `${title} av ${author}`;
}

function printTitles(titles: string[]): void {
  for (const title of titles) console.log(`- ${title}`);
}

function describeBook(title: string, genre?: string): string {
  return genre ? `${title} (${genre})` : title;
}

function describeBookWithDefault(
  title: string,
  lang: string = "svenska",
): string {
  return `${title} (${lang})`;
}

function searchLabel(query: string | number): string {
  if (typeof query === "number") {
    return `söker på id ${query}`;
  }
  return `söker på titel ${query}`;
}

function formatBook(book: Book): string {
  const rating = book.rating ? `★ ${book.rating}` : "";
  return `#${book.id} ${book.title} av ${book.author} (${book.year}) ${rating}`;
}

function isFiction(genre: Genre): boolean {
  return genre === "fiction" || genre === "sci-fi" || genre === "fantasy";
}

const immutable: ImmutableBook = { id: 1, title: "Dune" };
immutable.title = "Ny titel"; // ok
// immutable.id = 99; // readonly - kan inte ändras efter skapande

function booksWithRating(books: Book[]): Book[] {
  return books.filter((book) => book.rating !== undefined);
}

function findBook(books: Book[], query: string | number): Book | undefined {
  if (typeof query === "number") {
    return books.find((book) => book.id === query);
  }
  return books.find((book) => book.title.toLowerCase() === query.toLowerCase());
}

function averageRating(books: Book[]): number | undefined {
  const rated = booksWithRating(books);
  if (rated.length === 0) return undefined;

  const total = rated.reduce((acc, book) => acc + (book.rating ?? 0), 0);
  return total / rated.length;
}

console.log(bookLabel("Dune", "Frank Herbert"));
printTitles(["Dune", "The Hobbit"]);
console.log(describeBook("Dune"));
console.log(describeBook("Dune", "sci-fi"));
console.log(describeBookWithDefault("Dune"));
console.log(searchLabel(1));
console.log(searchLabel("Dune"));
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
console.log(isFiction("sci-fi"));
console.log(booksWithRating(library));
console.log(findBook(library, 2));
console.log(findBook(library, "Dune"));
console.log(averageRating(library));
