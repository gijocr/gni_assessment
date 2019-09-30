const INITIAL_STATE = {};

export default function config(state = INITIAL_STATE, action) {
  switch (action.type) {
    case 'SET_CONFIG':
      return { ...state, ...action.payload.config };

    default:
      return state;
  }
}
