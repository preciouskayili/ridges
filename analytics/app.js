const express = require("express");
const mysql = require("mysql");
const morgan = require("morgan");
const cors = require("cors");
const con = require("./config/db_connection");
require("dotenv/config");

const app = express();

// Import Routes
const storeRoute = require("./routes/api/store");

const port = process.env.PORT || 5000;

// Middleware and Routes
app.use(express.urlencoded({ extended: true }));
app.use(cors());
app.use(express.json());
app.use(morgan("dev"));

app.use("/api/v1", storeRoute);

app.use((req, res, next) => {
  res.locals.path = req.path;
  next();
});

// Routes
app.get("/", (req, res) => {
  res.send("hello from simple server :)");
});

// 404 Route
app.use((req, res) => {
  res.status(404).send({ msg: "404" });
});

con.connect((err) => {
  if (err) throw err;
  console.log("Connected");
  app.listen(port, () =>
    console.log("> Server is up and running on port : " + port)
  );
});
