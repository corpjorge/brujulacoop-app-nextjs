import axios from "axios";

axios.get(process.env.NEXT_PUBLIC_APP_URL+'/sanctum/csrf-cookie');

const httpClient = axios.create({
    baseURL: process.env.NEXT_PUBLIC_APP_BASE_URL
});

httpClient.interceptors.request.use(function (config) {
    const t = sessionStorage.getItem('t');
    const c = sessionStorage.getItem('c');
    config.headers.Authorization =  t ? `Bearer ${t}` : '';
    config.headers.c = c ? c : '';
    return config;
});

httpClient.defaults.withCredentials = true;

export default httpClient