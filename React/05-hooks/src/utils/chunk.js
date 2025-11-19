export default function chunk(arr, size) {
  return arr.reduce((acc, value, i) => {
    if (i % size === 0) {
      acc.push(arr.slice(i, i + size));
    }
    if (i === arr.length - 1 && acc.at(-1).length === 1 && acc.length > 1) {
      const last = acc.pop();
      acc[acc.length - 1].push(...last);
    }
    return acc;
  }, []);
}
