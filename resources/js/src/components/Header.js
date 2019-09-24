import React from 'react';

import { Container } from '../styles/components/Header';

export default function Header({ backgroundColor }) {
  return (
    <Container backgroundColor={backgroundColor} className="header py-4">
      <div className="container">
        <div className="row">
          <div className="col-sm-6">#LOGO_LEFT</div>
          <div className="col-sm-6 text-right">#LOGO_RIGHT</div>
        </div>
      </div>
    </Container>
  );
}
