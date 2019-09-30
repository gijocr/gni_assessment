import React from 'react';
import { connect } from 'react-redux';

import { Container } from '../styles/components/Footer';

function Footer(props) {
  const {
    page,
    page: { page_type: pageType },
  } = props;
  return (
    <Container backgroundColor={pageType.footer_color}>
      <div className="container">
        <div className="footer py-1">
          <div className="row">
            <div className="col">
              <small>{page.footer_label}</small>
            </div>
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

export default connect(mapStateToProps)(Footer);
