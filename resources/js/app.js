import Alpine from 'alpinejs'
import Intersect from '@alpinejs/intersect'

import.meta.glob(['../img/**'])

Alpine.plugin(Intersect)

Alpine.start()

if (typeof ezConsentCategories == 'object' && typeof __ezconsent == 'object') {
    window.ezConsentCategories.preferences = true;
    window.ezConsentCategories.statistics = true;
    window.ezConsentCategories.marketing = true;

    __ezconsent.setEzoicConsentSettings(window.ezConsentCategories);
}
