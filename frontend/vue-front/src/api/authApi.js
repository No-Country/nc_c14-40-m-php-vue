import axios from "axios";

const authApi = axios.create({
  baseURL: " https://nc-14-40.up.railway.app/api",
});

export default authApi;
