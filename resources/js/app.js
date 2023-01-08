import Alpine from 'alpinejs'
import Intersect from '@alpinejs/intersect'
import Persist from '@alpinejs/persist'

import.meta.glob(['../img/**'])

Alpine.plugin(Intersect)
Alpine.plugin(Persist)

Alpine.start()
