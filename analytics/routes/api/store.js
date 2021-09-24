const express = require("express");
const router = express.Router();
const con = require("../../config/db_connection");

router.get("/stores/:state", (req, res) => {
    const { state } = req.params;
    con.query('SELECT * FROM `stores` WHERE `state` = ?', [ state ], (err, result) => {
        if (err) throw err;
        res.send(result);
    })
})

module.exports = router;