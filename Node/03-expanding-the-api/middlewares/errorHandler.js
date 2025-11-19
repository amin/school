const ErrorHandler = (err, req, res, next) => {
  console.log(err.message);
  return res.status(500).send("Internal server error");
};

export default ErrorHandler;
