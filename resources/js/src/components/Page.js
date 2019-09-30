import React, { Component } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';

// Api
import { getData as apiGetData } from '../services/api';

// Actions
import * as ConfigActions from '../store/actions/config';
import * as PageActions from '../store/actions/page';

// Components
import Header from './Header';
import Body from './Body';
import Footer from './Footer';

// Styles
import { Content } from '../styles/components/Page';

class Page extends Component {
  constructor(props) {
    super(props);

    this.state = {
      loading: true,
    };
  }

  componentDidMount() {
    this.getApiData();
  }

  async getApiData() {
    const { setPage, setConfig } = this.props;
    const [resultConfigs, resultPage] = await apiGetData();

    const { page, ...rest } = resultPage.data;

    await setConfig(resultConfigs.data);
    await setPage(page, rest);

    this.setState({
      loading: false,
    });
  }

  hasFooter() {
    const { footer_label } = this.props.page;
    return footer_label.length > 0;
  }

  render() {
    const { loading } = this.state;
    const {
      page: { page_type: pageType },
    } = this.props;

    return (
      !loading && (
        <Content backgroundColor={pageType.body_color}>
          <Header />
          <Body hasFooter={this.hasFooter} />
          {this.hasFooter && <Footer />}
        </Content>
      )
    );
  }
}

const mapStateToProps = state => ({
  page: state.page,
  config: state.config,
});

const mapDispatchToProps = dispatch =>
  bindActionCreators({ ...PageActions, ...ConfigActions }, dispatch);

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(Page);
