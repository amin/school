import mongoose from "mongoose";
import express from "express";
import morgan from "morgan";
import helmet from "helmet";

import yearsRouter from "./routes/years.js";
import dataRouter from "./routes/data.js";
import reportsRouter from "./routes/reports.js";

import ErrorHandler from "./middlewares/errorHandler.js";
const app = express();

app.use(express.json());
app.use(morgan("tiny"));
app.use(helmet());

app.use("/years", yearsRouter);
app.use("/data", dataRouter);
app.use("/reports", reportsRouter);

app.use("*e", (req, res) => {
  res.status(404).send("Not found.");
});

app.use(ErrorHandler);

try {
  await mongoose.connect(
    "mongodb+srv://amincident:u31323883!!@perspiration.nkgkuxl.mongodb.net/perspiration?appName=perspiration",
  );

  app.listen(3500, () => {
    console.log(`Perspiration API running.`);
  });
} catch (error) {
  console.log(error.errmsg);
}
