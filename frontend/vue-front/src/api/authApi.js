import axios from "axios";

const authApi = axios.create({
  baseURL: " https://nc-40-deploy.onrender.com/api/",
});

export default authApi;
