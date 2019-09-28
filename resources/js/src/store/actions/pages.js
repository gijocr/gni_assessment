export const setPage = (pages, activePage, hasNext, activeQuestion = null) => ({
  type: 'SET_PAGE',
  payload: { pages, activePage, hasNext, activeQuestion },
});
