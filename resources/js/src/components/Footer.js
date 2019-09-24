import React from 'react';

import { Container } from '../styles/components/Footer';

export default function Footer({ backgroundColor }) {
  return (
    <Container backgroundColor={backgroundColor}>
      <div className="container">
        <div className="footer py-1">
          <div className="row">
            <div className="col">
              <small>#FOOTER</small>
            </div>
          </div>
        </div>
      </div>
    </Container>
  );
}
