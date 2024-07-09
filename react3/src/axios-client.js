import axios from "axios";
import { error } from "laravel-mix/src/Log";

const axiosClient = axios.create({
    baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`
})

axiosClient.interceptors.request.use((config) => {
    
    const token = localStorage.getItem('ACCESS_TOKEN') ;
    config.headers.Authorization = `Bearer ${token}` 
    return config;
})

axiosClient.interceptors.request.use((response) => {
    return response;

}, (error) => {
    if(response.status === 401){
        localStorage.delete('ACCESS_TOKEN')
    }
    throw error;
})
//export
export default axiosClient;