import express from "express";
import morgan from "morgan";
import helmet from "helmet";

import yearsRouter from "./routes/years.js";
import dataRouter from "./routes/data.js";

import ErrorHandler from "./middlewares/errorHandler.js";

const app = express();

app.use(morgan("tiny"));
app.use(helmet());

app.use("/years", yearsRouter);
app.use("/data", dataRouter);

app.use("*e", (req, res) => {
  res.status(404).send("Not found.");
});

app.use(ErrorHandler);
app.listen(3500);
