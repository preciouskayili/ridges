const express = require("express");
const router = express.Router();
const con = require("../../config/db_connection");

let stores;
router.get("/stores/:state", (req, res) => {
  const { state } = req.params;
  con.query(
    "SELECT * FROM `stores` WHERE `state` = ?",
    [state],
    (err, result) => {
      if (err) throw err;
      res.send(result);
      stores = result;
      console.log(stores, result);

      const findState = (state_name) => {
        // eslint-disable-next-line
        const [key, state] = Object.entries(Nigeria.layers).find(
          ([key, state]) => state.state_name === match.params.state_name
        );

        return state;
      };
    }
  );
});

module.exports = router;
