const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(bodyParser.json());

const PORT = process.env.PORT || 5000;

app.get('/', (req, res) => {
    res.send('EHR Backend is running.');
});

app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});