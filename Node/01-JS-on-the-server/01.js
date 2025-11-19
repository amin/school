const os = require("node:os");

const uptime = os.uptime();
const uptimeLimit = 14 * 86400;

if (uptime > uptimeLimit) {
  console.log("Uptime: " + Math.ceil(uptime / 86400) + " days");
  console.log("Reboot recommended");
} else {
  console.log("Uptime: " + Math.ceil(uptime / 86400) + " days");
}
