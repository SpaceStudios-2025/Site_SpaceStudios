import axios from 'axios';

const http = axios.create({
    baseURL: 'http://localhost:8000/api',
    method: 'POST',
    headers: {
        'Content-type': 'application/json'
    }
});

export default http;