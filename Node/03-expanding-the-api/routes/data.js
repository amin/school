import express from "express";
import yrgo from "../middlewares/yrgo.js";
import data from "../data.js";

const router = express.Router();

const totalPerspiration = data.reduce(
  (totalPerspiration, currentPerspiration) => {
    return (totalPerspiration += currentPerspiration.perspiration);
  },
  0,
);

router.use(yrgo);

router.get("/total", (req, res) => {
  res.json({
    totalPerspiration: totalPerspiration,
    unit: "ml",
  });
});

router.get("/average", (req, res) => {
  res.json({
    totalPerspiration: Math.floor(totalPerspiration / data.length),
    unit: "ml",
  });
});

export default router;
