import axios from "axios";

const authApi = axios.create({
  baseURL: 'https://no-country-c40.onrender.com/api',
});

export default authApi;
