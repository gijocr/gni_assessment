const INITIAL_STATE = { hasNext: false, hasQuestion: false };

export default function page(state = INITIAL_STATE, action) {
  switch (action.type) {
    case 'SET_PAGE':
      return {
        ...state,
        ...{
          ...action.payload.rest,
          ...action.payload.page,
        },
      };

    default:
      return state;
  }
}
