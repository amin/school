import express from "express";
import path from "node:path";

const app = express();
const port = 3000;

app.use(express.static("src/public"));

app.get("/", (req, res) => {
  res.sendFile(path.resolve("src/index.html"));
});

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`);
});
