/* eslint-disable camelcase */
/* eslint-disable react/prop-types */
import React from 'react';

// Utils
import { getImage } from '../utils/images';

// Components
import { Container } from '../styles/components/Header';

export default function Header({
  configs: { header_logo_left, header_logo_right },
  pageType: { header_color },
}) {
  return (
    <Container backgroundColor={header_color} className="header">
      <div className="container">
        <div className="row">
          <div className="col-sm-6">
            <img src={getImage(header_logo_left)} alt="GNI Assessment" />
          </div>
          <div className="col-sm-6 text-right">
            <img src={getImage(header_logo_right)} alt="GNI Assessment" />
          </div>
        </div>
      </div>
    </Container>
  );
}
