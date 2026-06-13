
module.exports = {
  default: {
    require: ["features/step_definitions/*.ts"],
    requireModule: ["ts-node/register"],
    publishQuiet: true,
    format: [
      "progress",
      "json:./cucumber-report/cucumber.json",
    ],
    paths: ["features/*.feature","features/**/*.feature"]  }
};