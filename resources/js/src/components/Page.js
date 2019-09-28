import React from 'react';

// Components
import Header from './Header';
import Body from './Body';
import Footer from './Footer';

// Styles
import { Content } from '../styles/components/Page';

export default function Page({ configs, page, page: { page_type } }) {
  return (
    <Content backgroundColor={page_type.body_color}>
      <Header configs={configs} pageType={page_type} />
      <Body page={page} pageType={page_type} configs={configs} />
      <Footer page={page} pageType={page_type} />
    </Content>
  );
}
