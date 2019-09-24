import React from 'react';
import ReactDOM from 'react-dom';
import { Route, BrowserRouter, Switch } from 'react-router-dom';

// Styles
import { GlobalStyle } from './styles/global';

// Pages
import Main from './pages/Main';

export default function Routes() {
  return (
    <>
      <GlobalStyle />
      <BrowserRouter>
        <Switch>
          <Route exact path="/" component={Main} />
        </Switch>
      </BrowserRouter>
    </>
  );
}

if (document.getElementById('app')) {
  ReactDOM.render(<Routes />, document.getElementById('app'));
}
