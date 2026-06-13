module.exports = {
	default: {
		require: ["features/step_definitions/*.ts"],
		publishQuiet: true,
		format: [
			"progress",
			"json:reports/cucumber-report.json"
		],
		paths: ["features/*.feature"],
		requireModule: ["ts-node/register"]
	}
}