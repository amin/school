const modifyHeader = (req, res, next) => {
  res.setHeader("class-of", "wu25");

  if (Math.round(Math.random()) !== 1) {
    return res.status(429).send("Too many requests");
  }

  next();
};

export default modifyHeader;
