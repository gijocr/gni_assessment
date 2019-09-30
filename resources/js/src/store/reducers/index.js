import { combineReducers } from 'redux';

import asnwer from './asnwer';
import config from './config';
import page from './page';
import question from './question';

export default combineReducers({
  asnwer,
  config,
  page,
  question,
});
