import mongoose from "mongoose";

const reportSchema = new mongoose.Schema({
  date: {
    type: Date,
    default: Date.now(),
  },
  authorId: Number,
  title: {
    type: String,
    required: true,
  },
});

const Report = mongoose.model("Report", reportSchema);

export default Report;
