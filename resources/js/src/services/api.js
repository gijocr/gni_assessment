import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api',
});

const getQuestionByPageType = (questionOrder, typeOrder) => {
  return api.get(`question/${questionOrder}/type/${typeOrder}`);
};

const getPageType = (pageOrder, typeOrder) => {
  return api.get(`page/${pageOrder}/type/${typeOrder}`);
};

const getData = () => {
  return axios.all([api.get('configs'), getPageType(0, 0)]);
};

const storeAnswer = data => {
  return api.put('answers', data);
};

export { api, getData, getPageType, storeAnswer, getQuestionByPageType };
