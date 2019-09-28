import { createStore, applyMiddleware } from 'redux';

import reducers from './reducers';

const composer = applyMiddleware(...[]);

const store = createStore(reducers, composer);

export default store;
