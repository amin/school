const fs = require("node:fs");

const array = fs.readFileSync("input.txt").toString().split("\n");

const precipitationData = array.map((line) => {
  const [year, precipitation] = line.split(" ");
  return [year, precipitation];
});

let totalPercipitation = 0;
let highestPercipitation = 0;

for (let data of precipitationData) {
  let currentPercipitation = parseInt(data[1]);
  totalPercipitation += currentPercipitation;

  if (currentPercipitation > highestPercipitation) {
    highestPercipitation = currentPercipitation;
  }
}

const averagePercipitation = Math.floor(
  totalPercipitation / precipitationData.length
);

console.log("Total perspiration: " + totalPercipitation + "ml");
console.log("Averiage percipitation: " + averagePercipitation + "ml");
console.log("Highest percipitation: " + highestPercipitation + "ml");
