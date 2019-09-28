import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api',
});

const getData = () => {
  return axios.all([api.get('configs'), api.get('page/0/type')]);
};

const getPageType = order => {
  return api.get(`page/${order}/type`);
};

const storeAnswer = data => {
  return api.put('answers', data);
};

export { api, getData, getPageType, storeAnswer };
