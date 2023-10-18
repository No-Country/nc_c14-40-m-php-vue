import axios from "axios";

const authApi = axios.create({
  baseURL: "https://identitytoolkit.googleapis.com/v1/accounts",
  params: {
    key: "AIzaSyCVhFLJKnsSx93Yh8xsU9HoQCJ1bhDkbLk",
  },
});

export default authApi;
