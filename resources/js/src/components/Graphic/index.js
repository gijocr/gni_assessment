import React from 'react';

import { ContentBar, Bar } from './styles';

export default function Graphic({ percent }) {
  return (
    <div className="row mb-2">
      <div className="col-3 d-flex align-items-center justify-content-end">
        <small>Vision and Strategy</small>
      </div>
      <div className="col-9">
        <ContentBar>
          <Bar percent={percent} />
        </ContentBar>
      </div>
    </div>
  );
}
