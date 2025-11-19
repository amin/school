import express from "express";
import data from "./data.js";

const app = express();
const port = 3000;

app.get("/years", (req, res) => {
  res.json(data);
});

app.get("/years/:year", (req, res) => {
  res.json(data.find((item) => item.year === Number(req.params.year)));
});

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`);
});

const totalPerspiration = data.reduce(
  (totalPerspiration, currentPerspiration) => {
    return (totalPerspiration += currentPerspiration.perspiration);
  },
  0
);

app.get("/data/total", (req, res) => {
  res.json({
    totalPerspiration: totalPerspiration,
    unit: "ml",
  });
});

app.get("/data/average", (req, res) => {
  res.json({
    totalPerspiration: Math.floor(totalPerspiration / data.length),
    unit: "ml",
  });
});
