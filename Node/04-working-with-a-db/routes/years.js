import express from "express";
import data from "../data.js";
const router = express.Router();

router.get("/", (req, res) => {
  res.json(data);
});

router.get("/:year", (req, res, next) => {
  const yearData = data.find((item) => item.year === Number(req.params.year));

  if (!yearData) {
    throw new Error(`Cannot find data from year ${req.params.year}`);
  }

  res.json(yearData);
});

export default router;
