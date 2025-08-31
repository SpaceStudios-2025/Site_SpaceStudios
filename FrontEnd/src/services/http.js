import axios from 'axios';

const http = axios.create({
    baseURL: 'http://localhost:5173/api',
    method: 'POST',
    headers: {
        'Content-type': 'application/json'
    }
});

export default http;