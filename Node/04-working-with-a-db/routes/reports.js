import expess from "express";
import Report from "../schemas/report.js";

const router = expess.Router();

router.get("/", async (req, res) => {
  try {
    const reports = await Report.find().sort({ date: -1 }).limit(10);
    res.json(reports);
  } catch (err) {
    res.status(500).json({ error: "Something went wrong" });
  }
});

router.post("/createReport", async (req, res) => {
  const reportTitle = req.body.title;
  const reportAuthorId = req.body.authorId;

  try {
    const report = await Report.create({
      authorId: reportAuthorId,
      title: reportTitle,
    });
    res.send(`Report: (${report.title}) has been added to the collection`);
  } catch (error) {
    res.send("Something went wrong.");
  }
});

router.get("/findReportByAuthor/:id", async (req, res) => {
  try {
    const findReport = await Report.find({ authorId: req.params.id });

    res.json(
      findReport.length
        ? findReport
        : {
            message: "Articles written by author is not found.",
          },
    );
  } catch (error) {
    res.status(500).json({ error: "Something went wrong" });
  }
});
export default router;
