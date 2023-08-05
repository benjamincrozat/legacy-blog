import algoliasearch from 'algoliasearch'

import.meta.glob(['../img/**'])

window.Algolia = algoliasearch(import.meta.env.VITE_ALGOLIA_APP_ID, import.meta.env.VITE_ALGOLIA_SECRET)
window.postsIndexName = `${import.meta.env.VITE_APP_ENV}_posts`
window.appUrl = import.meta.env.VITE_APP_URL
