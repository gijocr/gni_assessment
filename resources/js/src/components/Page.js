import React from 'react';

// Components
import Header from './Header';
import Body from './Body';
import Footer from './Footer';

// Styles
import { Content } from '../styles/components/Page';

export default function Page() {
  const headerBackgroundColor = '#286acc';
  const bodyBackgroundColor = '#4185f4';
  const footerBackgroundColor = '#286acc';
  return (
    <Content backgroundColor={bodyBackgroundColor}>
      <Header backgroundColor={headerBackgroundColor} />
      <Body backgroundColor={bodyBackgroundColor} />
      <Footer backgroundColor={footerBackgroundColor} />
    </Content>
  );
}
