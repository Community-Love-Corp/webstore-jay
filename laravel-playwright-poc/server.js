//install: npm install express 
//run: node server.js

const express = require('express');

const app = express();
const port = 8001;

//Simple API endpoint for Playwright testing
app.get('/api/user', (req, res) => {
	res.json({
		id: 1,
		name: "Test User",
		email: "user@example.com"	
	});
});

app.listen(port, () => {
	console.log('Mock API server running at http://127.0.0.1:${port}');
});