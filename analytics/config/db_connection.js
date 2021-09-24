const mysql = require("mysql");
require("dotenv/config");

// Connect to DB
const con = mysql.createConnection({
    host: process.env.DATABASE_HOST,
    user: process.env.DATABASE_USER,
    password: process.env.DATABASE_PASSWORD,
    database: process.env.DB_DATABASE
});

module.exports = con