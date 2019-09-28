import React, { Component } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';

// Api
import { getData as apiGetData } from '../../services/api';

// Actions
import * as PageActions from '../../store/actions/pages';

// Components
import Page from '../../components/Page';

class Main extends Component {
  constructor(props) {
    super(props);

    this.state = {
      loading: true,
      configs: [],
    };
  }

  componentDidMount() {
    this.getData();
  }

  async getData() {
    const { setPage } = this.props;
    const [configs, page] = await apiGetData();

    setPage(page.data.pages, 0, page.data.has_next);

    this.setState({
      loading: false,
      configs: configs.data,
    });
  }

  render() {
    const { loading, configs } = this.state;
    const {
      pages,
      pages: { activePage },
    } = this.props;
    return (
      !loading && <Page configs={configs} page={pages.pages[activePage]} />
    );
  }
}

const mapStateToProps = state => ({
  pages: state.pages,
});

const mapDispatchToProps = dispatch =>
  bindActionCreators(PageActions, dispatch);

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(Main);
