import React from 'react';
import ReactDOM from 'react-dom';
import { Route, BrowserRouter, Switch } from 'react-router-dom';

import { Provider } from 'react-redux';
import store from './store';

// Styles
import { GlobalStyle } from './styles/global';

// Pages
import Main from './pages/Main';

export default function Routes() {
  return (
    <>
      <GlobalStyle />
      <Provider store={store}>
        <BrowserRouter>
          <Switch>
            <Route exact path="/" component={Main} />
          </Switch>
        </BrowserRouter>
      </Provider>
    </>
  );
}

if (document.getElementById('app')) {
  ReactDOM.render(<Routes />, document.getElementById('app'));
}
