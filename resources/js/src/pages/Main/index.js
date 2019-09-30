import React from 'react';

// Components
import Page from '../../components/Page';

export default function Main() {
  // constructor(props) {
  //   super(props);

  //   this.state = {
  //     loading: true,
  //     configs: [],
  //   };
  // }

  // async getData() {
  //   const { setPage } = this.props;
  //   const [configs, page] = await apiGetData();

  //   setPage(page.data.pages, 0, page.data.has_next);

  //   this.setState({
  //     loading: false,
  //     configs: configs.data,
  //   });
  // }

  return <Page />;
}
