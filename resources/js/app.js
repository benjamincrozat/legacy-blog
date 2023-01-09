import algoliasearch from 'algoliasearch'
import Alpine from 'alpinejs'
import Intersect from '@alpinejs/intersect'
import Persist from '@alpinejs/persist'

import.meta.glob(['../img/**'])

window.Algolia = algoliasearch(import.meta.env.VITE_ALGOLIA_APP_ID, import.meta.env.VITE_ALGOLIA_SECRET)
window.postsIndexName = `${import.meta.env.VITE_APP_ENV}_posts`
window.appUrl = import.meta.env.VITE_APP_URL

Alpine.plugin(Intersect)
Alpine.plugin(Persist)

Alpine.start()
