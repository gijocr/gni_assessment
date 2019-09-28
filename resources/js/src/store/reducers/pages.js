const INITIAL_STATE = { pages: null, activePage: 0 };

export default function page(state = INITIAL_STATE, action) {
  switch (action.type) {
    case 'SET_PAGE':
      return { ...state, ...action.payload };

    default:
      return state;
  }
}
