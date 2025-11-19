const chessboard = document.querySelector("#chessboard");
const fragment = document.createDocumentFragment();
const BOARD_SIZE = { rows: 8, columns: 8 };

for (let i = 0; i < BOARD_SIZE.rows; i++) {
  const row = document.createElement("div");
  row.classList.add("row");

  for (let j = 0; j < BOARD_SIZE.columns; j++) {
    const square = document.createElement("div");
    square.classList.add("square");

    const colorClass = (i + j) % 2 === 0 ? "even" : "odd";
    square.classList.add(colorClass);

    if (j === 0) {
      const num = document.createElement("span");
      num.className = `number ${colorClass}`;
      num.textContent = BOARD_SIZE.rows - i;
      square.append(num);
    }

    if (i === BOARD_SIZE.rows - 1) {
      const letter = document.createElement("span");
      letter.className = `letter ${colorClass}`;
      letter.textContent = String.fromCharCode(97 + j);
      square.append(letter);
    }

    row.appendChild(square);
  }

  fragment.appendChild(row);
}

chessboard.appendChild(fragment);
