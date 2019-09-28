import React from 'react';

import { Container } from '../styles/components/Footer';

export default function Footer({
  page: { footer_label },
  pageType: { footer_color },
}) {
  return (
    <Container backgroundColor={footer_color}>
      <div className="container">
        <div className="footer py-1">
          <div className="row">
            <div className="col">
              <small>{footer_label}</small>
            </div>
          </div>
        </div>
      </div>
    </Container>
  );
}
