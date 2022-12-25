// import StudentController
const StudentController = require("../controllers/StudentController");
// import express js 
const express = require("express");

// membuat objek router
const router = express.Router();

/**
*membuat rooting, pertama endpointnya, handlesnya
*/

router.get("/", (req, res) => {
    res.send("Hello Express");
});

router.get("/students", StudentController.index);

router.post("/students", StudentController.store);

router.put("/students/:id", StudentController.update);

router.delete("/students/:id", StudentController.destroy);

// export router
module.exports = router;