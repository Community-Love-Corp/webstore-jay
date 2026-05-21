#!/usr/bin/env node

/**
 * Dynamic Markdown Table of Contents Generator (ESM)
 * Usage:
 *   node generate-toc.mjs README.md
 * 
 * How to setup
 * ------------
 * developer> chmod +x scripts/*.*
 * developer> node ./scripts/generate-toc.js ./cookbook/TestDrivenDevelopment.md
 * 
 * How to run
 * ----------
 * developer> node ./scripts/generate-toc.js ./cookbook/TestDrivenDevelopment.md
 */

import fs from 'fs';

if (process.argv.length < 3) {
  console.error('Usage: node generate-toc.mjs <markdown-file>');
  process.exit(1);
}

const filePath = process.argv[2];
const content = fs.readFileSync(filePath, 'utf8');

const lines = content.split('\n');

function githubAnchor(text) {
  return text
    .trim()
    .toLowerCase()
    .replace(/[^\w\- ]+/g, '')
    .replace(/\s+/g, '-')
    .replace(/-+/g, '-');
}

const toc = [];

for (const line of lines) {
  const match = line.match(/^(#{2,6})\s+(.*)/);
  if (!match) continue;

  const level = match[1].length;
  const title = match[2].trim();
  const anchor = githubAnchor(title);
  const indent = '  '.repeat(level - 2);

  toc.push(`${indent}- [${title}](#${anchor})`);
}

console.log(toc.join('\n'));
