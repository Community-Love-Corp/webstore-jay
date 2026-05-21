const fs = require('fs');

const raw = fs.readFileSync('build_number.txt', 'utf8').trim();
const build = raw.replace(/\.0$/, ''); // optional cleanup

const envContent = `REACT_APP_BUILD_NUMBER=${raw}\n`;

fs.writeFileSync('.env.development.local', envContent);

console.log(`Dev build number set to ${raw}`);
