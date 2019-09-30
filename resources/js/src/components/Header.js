/* eslint-disable camelcase */
/* eslint-disable react/prop-types */
import React from 'react';
import { connect } from 'react-redux';

// Utils
import { getImage } from '../utils/images';

// Components
import { Container } from '../styles/components/Header';

function Header(props) {
  const {
    config,
    page: { page_type },
  } = props;

  return (
    <Container backgroundColor={page_type.header_color} className="header">
      <div className="container">
        <div className="row">
          <div className="col-sm-6">
            <img src={getImage(config.header_logo_left)} alt="GNI Assessment" />
          </div>
          <div className="col-sm-6 text-right">
            <img
              src={getImage(config.header_logo_right)}
              alt="GNI Assessment"
            />
          </div>
        </div>
      </div>
    </Container>
  );
}

const mapStateToProps = state => ({
  page: state.page,
  config: state.config,
});

export default connect(mapStateToProps)(Header);
